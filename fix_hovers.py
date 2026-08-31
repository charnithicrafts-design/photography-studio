import os
import re

CSS_DIR = 'chitramaya/assets/css'

replacements = [
    # .impact-card
    (r'\.impact-card:hover\s*\{\s*transform:\s*translateY\(-4px\);\s*box-shadow:\s*(.*?);\s*\}', 
     r'.impact-card:hover {\n  background: var(--color-bg, #F7F4ED);\n  box-shadow: \1;\n}'),
    
    # .white-card (template-chitramaya.css)
    (r'\.white-card:hover\s*\{\s*transform:\s*translateY\(-4px\);\s*box-shadow:\s*(.*?);\s*\}', 
     r'.white-card:hover {\n                background: var(--color-bg, #F7F4ED);\n                box-shadow: \1;\n            }'),
    
    # .dark-card (template-chitramaya.css)
    (r'\.dark-card:hover\s*\{\s*transform:\s*translateY\(-4px\);\s*box-shadow:\s*(.*?);\s*\}', 
     r'.dark-card:hover {\n                background: rgba(255, 255, 255, 0.08);\n                box-shadow: \1;\n            }'),
     
    # .step (template-chitramaya.css)
    (r'\.step:hover\s*\{\s*transform:\s*translateY\(-4px\);\s*box-shadow:\s*(.*?);\s*\}', 
     r'.step:hover {\n                background: var(--color-bg, #F7F4ED);\n                box-shadow: \1;\n            }'),
     
    # .vertical-item (grid.css, services.css)
    (r'\.vertical-item:hover\s*\{\s*background:\s*rgba\(255,\s*255,\s*255,\s*0\.02\);\s*transform:\s*translateY\(-4px\);\s*box-shadow:\s*(.*?);\s*border-color:\s*(.*?);\s*\}', 
     r'.vertical-item:hover {\n  background: rgba(255, 255, 255, 0.05);\n  box-shadow: \1;\n  border-color: \2;\n}')
]

for root, dirs, files in os.walk(CSS_DIR):
    for file in files:
        if file.endswith('.css'):
            file_path = os.path.join(root, file)
            with open(file_path, 'r') as f:
                content = f.read()
            
            new_content = content
            for pat, repl in replacements:
                new_content = re.sub(pat, repl, new_content)
            
            # We also should remove 'transform' from the base class transitions if it's there
            # e.g., transition: transform 0.3s ease, box-shadow 0.3s ease; -> transition: background 0.3s ease, box-shadow 0.3s ease;
            # We will just replace 'transform 0.3s ease, box-shadow' with 'background 0.3s ease, box-shadow'
            new_content = re.sub(r'transition:\s*transform\s+0\.3s\s+ease,\s*box-shadow\s+0\.3s\s+ease;', r'transition: background 0.3s ease, box-shadow 0.3s ease;', new_content)
            
            if new_content != content:
                with open(file_path, 'w') as f:
                    f.write(new_content)
                print(f"Fixed hovers in {file}")

