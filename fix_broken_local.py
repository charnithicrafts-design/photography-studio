import os
import re
import glob

theme_dir = 'chitramaya'
php_files = glob.glob(os.path.join(theme_dir, '*.php'))

pattern = re.compile(r"<\?php echo get_template_directory_uri\(\); \?>/images/unsplash/([\w-]+)\.jpg")

for php_file in php_files:
    with open(php_file, 'r') as f:
        content = f.read()
    
    matches = pattern.findall(content)
    if not matches:
        continue
        
    print(f"Fixing broken local paths in {php_file}...")
    
    for photo_id in set(matches):
        new_src = f"https://images.unsplash.com/photo-{photo_id}?auto=format&fit=crop&w=1600&q=80"
        content = re.sub(rf"<\?php echo get_template_directory_uri\(\); \?>/images/unsplash/{photo_id}\.jpg", new_src, content)
        
    with open(php_file, 'w') as f:
        f.write(content)

print("Broken local paths converted to direct Unsplash CDN.")
