import os
import re
import urllib.request
import glob
import time

theme_dir = 'chitramaya'
img_dir = os.path.join(theme_dir, 'images', 'unsplash')
os.makedirs(img_dir, exist_ok=True)

php_files = glob.glob(os.path.join(theme_dir, '*.php'))

# Pattern to catch any unsplash download url
pattern = re.compile(r"https://unsplash\.com/photos/([\w-]+)/download\?w=\d+")

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'}

for php_file in php_files:
    with open(php_file, 'r') as f:
        content = f.read()
    
    matches = pattern.findall(content)
    if not matches:
        continue
        
    print(f"Processing {php_file} with {len(set(matches))} images...")
    
    for photo_id in set(matches):
        img_path = os.path.join(img_dir, f"{photo_id}.jpg")
        url = f"https://unsplash.com/photos/{photo_id}/download?w=1600"
        
        if not os.path.exists(img_path):
            try:
                print(f"  Downloading {photo_id}...")
                req = urllib.request.Request(url, headers=headers)
                with urllib.request.urlopen(req) as response, open(img_path, 'wb') as out_file:
                    out_file.write(response.read())
                time.sleep(1) # Prevent rate limiting
            except Exception as e:
                print(f"  Failed to download {photo_id}: {e}")
        
        # Replace in content (handling the ?w= parameter via regex substitution)
        new_src = f"<?php echo get_template_directory_uri(); ?>/images/unsplash/{photo_id}.jpg"
        content = re.sub(rf"https://unsplash\.com/photos/{photo_id}/download\?w=\d+", new_src, content)
        
    with open(php_file, 'w') as f:
        f.write(content)

print("Unsplash local migration complete.")
