import os
import glob

theme_dir = '/home/charlie/Games/Projects/chitramaya/chitramaya'
files = glob.glob(os.path.join(theme_dir, '**', '*'), recursive=True)

count = 0
for file in files:
    if os.path.isfile(file) and file.endswith(('.php', '.css', '.json', '.html')):
        with open(file, 'r', encoding='utf-8', errors='ignore') as f:
            content = f.read()
        
        if 'Chitramaya' in content:
            new_content = content.replace('Chitramaya', 'Chithramaya')
            with open(file, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Updated {file}")
            count += 1
            
        if 'chitramaya.com' in content:
            new_content = content.replace('chitramaya.com', 'chithramaya.com')
            with open(file, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Updated URL in {file}")

print(f"Done. Updated {count} files.")
