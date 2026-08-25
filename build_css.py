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
# We will skip http/https imports (like Google Fonts) and leave them or remove them?
# Wait, the plan was to remove blocking fonts, so we should KEEP font imports if they are there, OR move them to HTML.
# But style.css currently has @import url("https://fonts.googleapis.com..."); 
# We should remove it from the CSS entirely and rely on the HTML <link> tags which are non-blocking.
imports = re.findall(r'@import\s+url\([\'"]?([^\'"\)]+)[\'"]?\);', content)

css_payload = ""
for imp in imports:
    if imp.startswith('http'):
        print(f"Skipping external import: {imp} (should be handled via HTML for perf)")
        continue
    
    file_path = os.path.join(THEME_DIR, imp)
    if os.path.exists(file_path):
        with open(file_path, 'r') as cf:
            css_payload += cf.read() + "\n"
    else:
        print(f"Warning: File not found {file_path}")

minified = minify_css(css_payload)
compiled_content += minified

with open(COMPILED_CSS, 'w') as f:
    f.write(compiled_content)

print(f"Compilation complete! Wrote {len(minified)} bytes to {COMPILED_CSS}")
