import os
import re
import glob
import subprocess
import time

theme_dir = 'chitramaya'
php_files = glob.glob(os.path.join(theme_dir, '*.php'))

pattern = re.compile(r"https://unsplash\.com/photos/([\w-]+)/download\?w=\d+")
url_cache = {}

for php_file in php_files:
    with open(php_file, 'r') as f:
        content = f.read()
    
    matches = pattern.findall(content)
    if not matches:
        continue
        
    print(f"Resolving URLs in {php_file}...")
    
    for photo_id in set(matches):
        if photo_id not in url_cache:
            cmd = [
                "curl", "-s", "-L", "-A", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36",
                "-o", "/dev/null", "-w", "%{url_effective}",
                f"https://unsplash.com/photos/{photo_id}/download?w=1600"
            ]
            try:
                print(f"  Curling {photo_id}...")
                effective_url = subprocess.check_output(cmd, universal_newlines=True).strip()
                if "images.unsplash.com" in effective_url:
                    # Unsplash might return 2000px, let's just keep their parameters
                    url_cache[photo_id] = effective_url
                else:
                    print(f"  Failed to resolve {photo_id}: {effective_url}")
            except Exception as e:
                print(f"  Error curling {photo_id}: {e}")
            time.sleep(0.5)
        
        if photo_id in url_cache:
            new_src = url_cache[photo_id]
            content = re.sub(rf"https://unsplash\.com/photos/{photo_id}/download\?w=\d+", new_src, content)
            
    with open(php_file, 'w') as f:
        f.write(content)

print("All Unsplash URLs resolved and updated.")
