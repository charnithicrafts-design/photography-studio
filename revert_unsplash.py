import os
import re
import glob

theme_dir = 'chitramaya'
php_files = glob.glob(os.path.join(theme_dir, '*.php'))

pattern = re.compile(r"https://images\.unsplash\.com/photo-([a-zA-Z0-9_-]{11})\?auto=format&fit=crop&w=\d+&q=80")

for php_file in php_files:
    with open(php_file, 'r') as f:
        content = f.read()
    
    matches = pattern.findall(content)
    if not matches:
        continue
        
    print(f"Reverting {php_file}...")
    
    for photo_id in set(matches):
        new_src = f"https://unsplash.com/photos/{photo_id}/download?w=1600"
        content = re.sub(rf"https://images\.unsplash\.com/photo-{photo_id}\?auto=format&fit=crop&w=\d+&q=80", new_src, content)
        
    with open(php_file, 'w') as f:
        f.write(content)

print("Reverted to original Unsplash download redirect URLs.")
