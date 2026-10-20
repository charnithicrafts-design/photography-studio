import ftplib
import os
import sys
import subprocess
import zipfile
import urllib.request
import time
import secrets

# 0. Enforce Pre-Flight Gate
print("Running Chithramaya Pre-Flight Release Gate...")
try:
    subprocess.run([sys.executable, 'preflight.py'], check=True)
except Exception as e:
    print(f"Pre-flight gate check failed: {e}")
    sys.exit(1)

# 1. Load Secrets
try:
    with open('.ftp-secret', 'r') as f:
        secrets = {}
        for line in f:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                secrets[k] = v.strip('"\' ')
    FTP_HOST = secrets.get('FTP_HOST')
    FTP_USER = secrets.get('FTP_USER')
    FTP_PASS = secrets.get('FTP_PASS')
except Exception as e:
    print(f"Error loading secrets: {e}")
    sys.exit(1)

# Directories to never upload to the server
SKIP_DIR_SEGMENTS = [
    'node_modules',
    '.git',
    'tools',
    '__pycache__',
    '.cache',
    'src',          # Vite source — only dist/ is needed
    'vendor',       # Composer vendor (static on server)
    'tests',
    '.psalm',
]

PAYLOAD_ZIP = 'theme_assets_payload.zip'
UNZIP_PHP = 'system_log.php'

print("\nBuilding deployment zip payload...")

# 2. Build Zip File
with zipfile.ZipFile(PAYLOAD_ZIP, 'w', zipfile.ZIP_DEFLATED) as zipf:
    
    # Gather theme files
    for root, dirs, files in os.walk('chitramaya'):
        dirs[:] = [d for d in dirs if d not in SKIP_DIR_SEGMENTS]
        if any(seg in root.replace('\\', '/').split('/') for seg in SKIP_DIR_SEGMENTS):
            continue
        for file in files:
            if file.startswith('.'):
                continue
            local_path = os.path.join(root, file)
            archive_path = 'wp-content/themes/' + local_path.replace('\\', '/')
            zipf.write(local_path, archive_path)
            
    # Gather plugin files
    plugin_local_dir = 'wp-content/plugins/chitramaya-proofing'
    if os.path.exists(plugin_local_dir):
        for root, dirs, files in os.walk(plugin_local_dir):
            dirs[:] = [d for d in dirs if d not in SKIP_DIR_SEGMENTS]
            if any(seg in root.replace('\\', '/').split('/') for seg in SKIP_DIR_SEGMENTS):
                continue
            for file in files:
                if file.startswith('.'):
                    continue
                local_path = os.path.join(root, file)
                archive_path = local_path.replace('\\', '/')
                zipf.write(local_path, archive_path)
                
    # Root files
    root_files = [
        ('.htaccess', '.htaccess'),
        ('favicon.ico', 'favicon.ico'),
        ('chitramaya/chitramaya-landing.html', 'chitramaya-landing.html'),
        ('chitramaya/thalam-landing.html', 'thalam-landing.html'),
        ('design-preview.html', 'design-preview.html')
    ]
    for local_f, arch_f in root_files:
        if os.path.exists(local_f):
            zipf.write(local_f, arch_f)

print(f"Payload built: {PAYLOAD_ZIP} ({os.path.getsize(PAYLOAD_ZIP) // 1024} KB)")

# 3. Generate Secure Unzip Script with One-Time Token
deploy_token = secrets.token_urlsafe(32)
unzip_script = f"""<?php
if (!isset($_GET['token']) || $_GET['token'] !== '{deploy_token}') {{
    http_response_code(403);
    die('Forbidden: Invalid deployment token.');
}}
$zip = new ZipArchive;
$res = $zip->open('theme_assets_payload.zip');
if ($res === TRUE) {{
    $zip->extractTo(__DIR__);
    $zip->close();
    echo "SUCCESS: Extraction complete.\\n";
}} else {{
    echo "ERROR: Failed to open zip file.\\n";
}}
// Clean up
@unlink('theme_assets_payload.zip');
@unlink(__FILE__);
?>"""

with open(UNZIP_PHP, 'w') as f:
    f.write(unzip_script)

# 4. Upload securely via FTPS (FTP over TLS)
print("\nConnecting securely to FTPS...")
try:
    ftp = ftplib.FTP_TLS(timeout=30)
    ftp.connect(FTP_HOST, 21)
    ftp.auth()
    ftp.login(FTP_USER, FTP_PASS)
    ftp.prot_p()  # Enforce encrypted TLS data connection
    ftp.cwd('chithramaya.charnithi.com')
    
    print(f"Uploading {PAYLOAD_ZIP}...")
    with open(PAYLOAD_ZIP, 'rb') as f:
        ftp.storbinary(f'STOR {PAYLOAD_ZIP}', f)
        
    print(f"Uploading {UNZIP_PHP}...")
    with open(UNZIP_PHP, 'rb') as f:
        ftp.storbinary(f'STOR {UNZIP_PHP}', f)
        
    ftp.quit()
    print("Secure FTPS transfer complete.")
except Exception as e:
    print(f"FTPS transfer failed: {e}")
    # Cleanup locals if FTP fails
    if os.path.exists(PAYLOAD_ZIP): os.remove(PAYLOAD_ZIP)
    if os.path.exists(UNZIP_PHP): os.remove(UNZIP_PHP)
    sys.exit(1)

# 5. Trigger Extraction via HTTP with One-Time Token
print("\nTriggering server-side extraction...")
req = urllib.request.Request(
    f"https://chithramaya.charnithi.com/{UNZIP_PHP}?token={deploy_token}", 
    headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}
)
try:
    response = urllib.request.urlopen(req, timeout=30)
    result = response.read().decode('utf-8').strip()
    print(f"Server response: {result}")
except Exception as e:
    print(f"Error triggering extraction: {e}")
    print(f"Check https://chithramaya.charnithi.com/{UNZIP_PHP} manually.")

# 6. Local Cleanup
if os.path.exists(PAYLOAD_ZIP): os.remove(PAYLOAD_ZIP)
if os.path.exists(UNZIP_PHP): os.remove(UNZIP_PHP)

print("\nDeployment successfully finished in seconds!")
