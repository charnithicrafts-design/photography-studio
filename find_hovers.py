import os
import re

CSS_DIR = 'chitramaya/assets/css'

for root, dirs, files in os.walk(CSS_DIR):
    for file in files:
        if file.endswith('.css'):
            file_path = os.path.join(root, file)
            with open(file_path, 'r') as f:
                content = f.read()
            
            # Print instances of translateY in hover
            hovers = re.findall(r'(\S+:hover\s*\{[^}]*transform:\s*translateY[^}]*\})', content)
            if hovers:
                print(f"--- {file} ---")
                for h in hovers:
                    print(h)

