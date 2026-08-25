import urllib.request
import re
import os
import subprocess
import concurrent.futures
import time

def get_image_ids(url, limit=50):
    try:
        html = subprocess.check_output(["curl", "-s", "-L", url], universal_newlines=True)
        pattern = r'https://images.unsplash.com/photo-[a-zA-Z0-9-]+'
        matches = list(dict.fromkeys(re.findall(pattern, html)))
        return matches[:limit]
    except Exception as e:
        print(f"Error fetching {url}: {e}")
        return []

def download_image(url, filepath):
    if os.path.exists(filepath):
        print(f"Skipping {filepath}, already exists.")
        return
    try:
        subprocess.check_call(["curl", "-s", "-L", "-o", filepath, url])
        print(f"Downloaded: {filepath}")
        time.sleep(1) # Be nice to Unsplash
    except Exception as e:
        print(f"Failed to download {url}: {e}")

def main():
    desktop = os.path.expanduser("~/Desktop")
    wedding_dir = os.path.join(desktop, "Alans_Wedding_Photos")
    award_dir = os.path.join(desktop, "Sallys_Award_Ceremony_Photos")
    
    os.makedirs(wedding_dir, exist_ok=True)
    os.makedirs(award_dir, exist_ok=True)

    print("Fetching wedding image IDs...")
    wedding_urls = get_image_ids("https://unsplash.com/collections/3178572/wedding", limit=50)
    print(f"Found {len(wedding_urls)} wedding photos.")

    print("Fetching award ceremony image IDs...")
    award_urls = get_image_ids("https://unsplash.com/s/photos/award-ceremony", limit=15)
    print(f"Found {len(award_urls)} award photos.")

    tasks = []
    with concurrent.futures.ThreadPoolExecutor(max_workers=3) as executor:
        for i, url in enumerate(wedding_urls):
            filename = os.path.join(wedding_dir, f"alans-wedding-{i+1:02d}.jpg")
            tasks.append(executor.submit(download_image, url, filename))
            
        for i, url in enumerate(award_urls):
            filename = os.path.join(award_dir, f"sallys-award-{i+1:02d}.jpg")
            tasks.append(executor.submit(download_image, url, filename))

    for future in concurrent.futures.as_completed(tasks):
        pass

    print("\nAll downloads complete!")
    print(f"Wedding Photos: {wedding_dir}")
    print(f"Award Photos: {award_dir}")

if __name__ == "__main__":
    main()
