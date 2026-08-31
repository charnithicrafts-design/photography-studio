import os
import re

CSS_DIR = 'chitramaya/assets/css/pages'

def process_clamp(match):
    original = match.group(0)
    # Extract the third argument (max size)
    # example: clamp(2rem, 5vw, 5rem) -> 5rem
    # example: clamp(3rem, 26cqw, 16rem) -> 16rem
    inner = match.group(1)
    parts = inner.split(',')
    if len(parts) == 3:
        max_val_str = parts[2].strip()
        # parse number
        m = re.match(r'^([0-9.]+)', max_val_str)
        if m:
            val = float(m.group(1))
            unit = max_val_str[m.end():].strip()
            # Convert to a comparable value (assuming rem or px)
            if unit == 'rem' or unit == 'em':
                val_px = val * 16
            elif unit == 'px':
                val_px = val
            elif unit == 'vw' or unit == 'vh':
                val_px = val * 10 # very rough estimate
            else:
                val_px = val * 16 # fallback
                
            if val_px >= 50:
                return 'font-size: var(--type-display)'
            elif val_px >= 30:
                return 'font-size: var(--type-section)'
            # leave smaller ones alone, or maybe map them too?
            # var(--type-subhead) is ~18px
    return original

for root, dirs, files in os.walk(CSS_DIR):
    for file in files:
        if file.endswith('.css'):
            file_path = os.path.join(root, file)
            with open(file_path, 'r') as f:
                content = f.read()
            
            # 1. Fix massive clamps
            content = re.sub(r'font-size:\s*clamp\(([^)]+)\)', process_clamp, content)
            
            # 2. Remove negative letter spacing
            content = re.sub(r'\s*letter-spacing:\s*-[0-9.]+e?m?p?x?;', '', content)
            
            # 3. For .corp-hero-h1 and similar massive headers, maybe ensure text-transform isn't overly abused if it looks stretched, but let's stick to the tracking and size first.
            
            with open(file_path, 'w') as f:
                f.write(content)

print("Typography fixes applied.")
