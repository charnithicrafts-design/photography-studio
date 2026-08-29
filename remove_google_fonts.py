import os
import re

THEME_DIR = 'chitramaya'

for root, dirs, files in os.walk(THEME_DIR):
    for file in files:
        if file.endswith('.php') or file.endswith('.html'):
            file_path = os.path.join(root, file)
            with open(file_path, 'r') as f:
                content = f.read()
            
            # Remove preconnects
            content = re.sub(r'<link rel="preconnect" href="https://fonts.googleapis.com">\s*', '', content)
            content = re.sub(r'<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>\s*', '', content)
            
            # Remove stylesheet links
            content = re.sub(r'<link href="https://fonts.googleapis.com/css2[^>]+>\s*', '', content)
            
            with open(file_path, 'w') as f:
                f.write(content)

print("Google Fonts removed from all templates.")
