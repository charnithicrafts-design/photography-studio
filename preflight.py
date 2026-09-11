#!/usr/bin/env python3
"""
preflight.py — Chithramaya Release Manager Pre-Flight Gate
⚙️  Forge / Sally / Eleanor sign-off before any deploy leaves this machine.

Run:  python3 preflight.py
Exit: 0 = PASS (safe to deploy)  |  1 = FAIL (deploy blocked)

Checks:
  1. node_modules / dev artifacts NOT in deploy payload
  2. Total theme file count and size within safe limits
  3. PHP syntax clean on all modified .php templates
  4. CSS build is fresh (style.compiled.css newer than any source .css)
  5. No uncommitted changes to deploy-critical files
  6. No debug / nuke / temporary scripts in theme root
"""

import os
import sys
import subprocess
import time

# ─── CONFIG ──────────────────────────────────────────────────────────────────

THEME_DIR = 'chitramaya'
COMPILED_CSS = os.path.join(THEME_DIR, 'style.compiled.css')
CSS_SOURCE_DIR = os.path.join(THEME_DIR, 'assets', 'css')

# Directories that must never appear in the deploy payload
FORBIDDEN_DIRS = [
    'node_modules',
    '.git',
    '__pycache__',
    '.cache',
    '.npm',
    'vendor',
    'tests',
    '.psalm',
    'coverage',
    '.nyc_output',
]

# Files/patterns that must never be in the theme root
FORBIDDEN_THEME_ROOT_FILES = [
    'debug.php',
    'nuke.php',
    'rebuild.php',
    'fix_prefix.php',
    'import-db.php',
    'unzip.php',
]

# Deploy-critical files — must have no uncommitted changes
CRITICAL_FILES = [
    'chitramaya/template-chitramaya.php',
    'chitramaya/style.compiled.css',
    'chitramaya/functions.php',
    'chitramaya/inc/seo-engine.php',
    '.htaccess',
    'deploy.py',
    'deploy_via_ftp.py',
]

# Payload size limits
MAX_THEME_FILES = 500          # total file count
MAX_THEME_SIZE_MB = 50         # total uncompressed MB

# ─── HELPERS ─────────────────────────────────────────────────────────────────

PASS = '\033[92m✔\033[0m'
FAIL = '\033[91m✘\033[0m'
WARN = '\033[93m⚠\033[0m'
BOLD = '\033[1m'
RESET = '\033[0m'

failures = []
warnings = []

def check(label, passed, detail='', fatal=True):
    if passed:
        print(f'  {PASS}  {label}')
    else:
        marker = FAIL if fatal else WARN
        print(f'  {marker}  {label}')
        if detail:
            print(f'       {detail}')
        if fatal:
            failures.append(label)
        else:
            warnings.append(label)

# ─── CHECK 1: No forbidden directories in deploy payload ─────────────────────

def check_forbidden_dirs():
    print(f'\n{BOLD}[1] Payload — Forbidden directories{RESET}')
    found = []
    for root, dirs, files in os.walk(THEME_DIR):
        for d in dirs:
            if d in FORBIDDEN_DIRS:
                full = os.path.join(root, d)
                found.append(full)
        # Prune so we don't recurse into them (faster)
        dirs[:] = [d for d in dirs if d not in FORBIDDEN_DIRS]

    check(
        f'No forbidden dirs in {THEME_DIR}/',
        len(found) == 0,
        detail='\n       '.join(found[:5]) + (f'\n       ...and {len(found)-5} more' if len(found) > 5 else ''),
    )

# ─── CHECK 2: Payload size ────────────────────────────────────────────────────

def check_payload_size():
    print(f'\n{BOLD}[2] Payload — File count and size{RESET}')
    total_files = 0
    total_bytes = 0
    for root, dirs, files in os.walk(THEME_DIR):
        dirs[:] = [d for d in dirs if d not in FORBIDDEN_DIRS]
        for f in files:
            if f.startswith('.'):
                continue
            fpath = os.path.join(root, f)
            total_files += 1
            total_bytes += os.path.getsize(fpath)

    total_mb = total_bytes / (1024 * 1024)
    check(
        f'File count ≤ {MAX_THEME_FILES} (found {total_files})',
        total_files <= MAX_THEME_FILES,
        detail=f'Too many files — check for stray assets.',
    )
    check(
        f'Payload size ≤ {MAX_THEME_SIZE_MB} MB (found {total_mb:.1f} MB)',
        total_mb <= MAX_THEME_SIZE_MB,
        detail=f'Payload is {total_mb:.1f} MB — likely dev artifacts included.',
    )

# ─── CHECK 3: PHP syntax ─────────────────────────────────────────────────────

def check_php_syntax():
    print(f'\n{BOLD}[3] PHP syntax — all templates{RESET}')
    php_files = []
    for root, dirs, files in os.walk(THEME_DIR):
        dirs[:] = [d for d in dirs if d not in FORBIDDEN_DIRS]
        for f in files:
            if f.endswith('.php'):
                php_files.append(os.path.join(root, f))

    errors = []
    for php in php_files:
        result = subprocess.run(['php', '-l', php], capture_output=True, text=True)
        if result.returncode != 0:
            errors.append(f'{php}: {result.stderr.strip()}')

    check(
        f'PHP syntax clean ({len(php_files)} files checked)',
        len(errors) == 0,
        detail='\n       '.join(errors[:3]),
    )

# ─── CHECK 4: CSS build freshness ────────────────────────────────────────────

def check_css_freshness():
    print(f'\n{BOLD}[4] CSS build — style.compiled.css is fresh{RESET}')
    if not os.path.exists(COMPILED_CSS):
        check('style.compiled.css exists', False, detail='Run: python3 build_css.py')
        return

    compiled_mtime = os.path.getmtime(COMPILED_CSS)
    stale_sources = []
    for root, dirs, files in os.walk(CSS_SOURCE_DIR):
        for f in files:
            if f.endswith('.css'):
                fpath = os.path.join(root, f)
                if os.path.getmtime(fpath) > compiled_mtime:
                    stale_sources.append(fpath)

    check(
        'style.compiled.css is newer than all source CSS',
        len(stale_sources) == 0,
        detail='Stale sources:\n       ' + '\n       '.join(stale_sources[:5]) + '\n       Run: python3 build_css.py',
    )

# ─── CHECK 5: No uncommitted changes to critical files ───────────────────────

def check_git_clean():
    print(f'\n{BOLD}[5] Git — critical files committed{RESET}')
    result = subprocess.run(
        ['git', 'diff', '--name-only'] + CRITICAL_FILES,
        capture_output=True, text=True
    )
    dirty = [f for f in result.stdout.strip().splitlines() if f]
    check(
        'No uncommitted changes to critical files',
        len(dirty) == 0,
        detail='Uncommitted: ' + ', '.join(dirty),
        fatal=False,  # Warning only — allow deploy with dirty working tree
    )

# ─── CHECK 6: No debug/nuke scripts in theme root ────────────────────────────

def check_dangerous_files():
    print(f'\n{BOLD}[6] Safety — no debug/nuke scripts in project root{RESET}')
    found = [f for f in FORBIDDEN_THEME_ROOT_FILES if os.path.exists(f)]
    check(
        'No dangerous scripts in project root',
        len(found) == 0,
        detail='Found: ' + ', '.join(found) + '\n       Remove or move them before deploying.',
        fatal=False,  # Warning — they won't be in the theme zip/ftp but still messy
    )

# ─── MAIN ─────────────────────────────────────────────────────────────────────

if __name__ == '__main__':
    print(f'\n{BOLD}╔══════════════════════════════════════════════════╗')
    print(f'║   CHITHRAMAYA RELEASE MANAGER — PRE-FLIGHT GATE  ║')
    print(f'╚══════════════════════════════════════════════════╝{RESET}')
    print(f'  Theme: {THEME_DIR}/   |   Time: {time.strftime("%Y-%m-%d %H:%M:%S")}')

    check_forbidden_dirs()
    check_payload_size()
    check_php_syntax()
    check_css_freshness()
    check_git_clean()
    check_dangerous_files()

    print()
    if failures:
        print(f'{BOLD}\033[91m✘ PRE-FLIGHT FAILED — {len(failures)} blocker(s):\033[0m')
        for f in failures:
            print(f'   • {f}')
        print(f'\n  Deploy is BLOCKED. Fix the above before running deploy_via_ftp.py or deploy.py.\n')
        sys.exit(1)
    else:
        if warnings:
            print(f'{BOLD}\033[93m⚠  {len(warnings)} warning(s) — review before deploying:\033[0m')
            for w in warnings:
                print(f'   • {w}')
            print()
        print(f'{BOLD}\033[92m✔  ALL CHECKS PASSED — Safe to deploy.\033[0m\n')
        sys.exit(0)
