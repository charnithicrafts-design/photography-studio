import os
import re

THEME_DIR = 'chitramaya'
MAIN_CSS = os.path.join(THEME_DIR, 'style.css')
COMPILED_CSS = os.path.join(THEME_DIR, 'style.compiled.css')

def minify_css(css_str):
    # Remove CSS comments
    css_str = re.sub(r'/\*.*?\*/', '', css_str, flags=re.DOTALL)
    # Remove extra whitespace and newlines
    css_str = re.sub(r'\s+', ' ', css_str)
    # Remove space around delimiters
    css_str = re.sub(r'\s*([\{\}\:\;\,])\s*', r'\1', css_str)
    return css_str.strip()

print("Building style.compiled.css...")
with open(MAIN_CSS, 'r') as f:
    content = f.read()

# Extract the header (Theme Name, etc)
header_match = re.search(r'/\*[\s\S]*?\*/', content)
header = header_match.group(0) + '\n' if header_match else ''

compiled_content = header

# Find all @import url("...");
# Chithramaya brand rule: 100% self-hosted local fonts in critical.css. Zero external font imports.
imports = re.findall(r'@import\s+url\([\'"]?([^\'"\)]+)[\'"]?\);', content)

css_payload = ""
for imp in imports:
    if imp.startswith('http'):
        raise ValueError(f"Brand violation: External import '{imp}' forbidden. All fonts must be 100% self-hosted local fonts.")
    
    file_path = os.path.join(THEME_DIR, imp)
    if os.path.exists(file_path):
        with open(file_path, 'r') as cf:
            css_payload += cf.read() + "\n"
    else:
        print(f"Warning: File not found {file_path}")

# Preprocessor: Replace Responsive Breakpoint Tokens
BREAKPOINTS = {
    # Mobile-First (min-width)
    '$bp-mobile': '320px',
    '$bp-tablet': '768px',
    '$bp-laptop': '960px',
    '$bp-desktop': '1440px',
    
    # Legacy Desktop-First (max-width) fallbacks
    '$bp-desktop-max': '1439px',
    '$bp-laptop-max': '959px',
    '$bp-tablet-max': '767px',
    '$bp-mobile-max': '599px',
}
# Sort tokens by length descending to prevent partial replacements (e.g. $bp-laptop vs $bp-laptop-max)
for token, value in sorted(BREAKPOINTS.items(), key=lambda x: len(x[0]), reverse=True):
    css_payload = css_payload.replace(token, value)

minified = minify_css(css_payload)
compiled_content += minified

with open(COMPILED_CSS, 'w') as f:
    f.write(compiled_content)

print(f"Compilation complete! Wrote {len(minified)} bytes to {COMPILED_CSS}")


# Process Page-Specific CSS
print("Building page-specific CSS...")
PAGES_DIR = os.path.join(THEME_DIR, 'assets', 'css', 'pages')
if os.path.exists(PAGES_DIR):
    for filename in os.listdir(PAGES_DIR):
        if filename.endswith('.css') and not filename.endswith('.compiled.css'):
            source_path = os.path.join(PAGES_DIR, filename)
            compiled_path = os.path.join(PAGES_DIR, filename.replace('.css', '.compiled.css'))
            
            with open(source_path, 'r') as f:
                page_css = f.read()
                
            for token, value in sorted(BREAKPOINTS.items(), key=lambda x: len(x[0]), reverse=True):
                page_css = page_css.replace(token, value)
                
            minified_page = minify_css(page_css)
            with open(compiled_path, 'w') as f:
                f.write(minified_page)
            print(f"Compiled {filename} -> {os.path.basename(compiled_path)}")
