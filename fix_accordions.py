import os
import re

CSS_DIR = 'chitramaya/assets/css/pages'

for root, dirs, files in os.walk(CSS_DIR):
    for file in files:
        if file.endswith('.css'):
            file_path = os.path.join(root, file)
            with open(file_path, 'r') as f:
                content = f.read()
            
            # The broken block looks like this:
            # .b-accordion-btn[aria-expanded="true"] + .b-accordion-panel {
            #   display: none;
            
            new_content = re.sub(
                r'\.b-accordion-btn\[aria-expanded="true"\] \+ \.b-accordion-panel\s*\{\s*display:\s*none;',
                '.b-accordion-btn[aria-expanded="true"] + .b-accordion-panel {\n  display: block;\n  animation: slideDown 0.3s ease forwards;',
                content
            )
            
            if new_content != content:
                with open(file_path, 'w') as f:
                    f.write(new_content)
                print(f"Fixed {file}")

