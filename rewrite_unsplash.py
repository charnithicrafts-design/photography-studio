import os
import re
import glob

theme_dir = 'chitramaya'
php_files = glob.glob(os.path.join(theme_dir, '*.php'))

# Pattern to catch any unsplash download url
# e.g., https://unsplash.com/photos/gqMGjomMxCw/download?w=1600
pattern = re.compile(r"https://unsplash\.com/photos/([\w-]+)/download\?w=\d+")

for php_file in php_files:
    with open(php_file, 'r') as f:
        content = f.read()
    
    matches = pattern.findall(content)
    if not matches:
        continue
        
    print(f"Fixing {php_file}...")
    
    for photo_id in set(matches):
        # Replace the tracking redirect URL with the direct Unsplash CDN URL
        # e.g. https://images.unsplash.com/photo-gqMGjomMxCw?auto=format&fit=crop&w=1600&q=80
        new_src = f"https://images.unsplash.com/photo-{photo_id}?auto=format&fit=crop&w=1600&q=80"
        content = re.sub(rf"https://unsplash\.com/photos/{photo_id}/download\?w=\d+", new_src, content)
        
    with open(php_file, 'w') as f:
        f.write(content)

print("Unsplash CDN rewrite complete.")
