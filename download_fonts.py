import os
import urllib.request
import re

THEME_DIR = 'chitramaya'
FONTS_DIR = os.path.join(THEME_DIR, 'assets', 'fonts')
os.makedirs(FONTS_DIR, exist_ok=True)

# The full list of Google Fonts URLs found across the templates
font_urls = [
    "https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300&display=swap",
    "https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap",
    "https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400&display=swap",
    "https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap",
    "https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;0,600;0,700;1,400&display=swap",
    "https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;700&display=swap",
    "https://fonts.googleapis.com/css2?family=Oswald:wght@600;700&display=swap"
]

# We must send a modern user-agent so Google serves the compact woff2 files, not legacy ttf
headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36'
}

combined_css = ""

print("Downloading Google Fonts...")
for url in font_urls:
    print(f"Fetching CSS from: {url}")
    req = urllib.request.Request(url, headers=headers)
    with urllib.request.urlopen(req) as response:
        css = response.read().decode('utf-8')
    
    # Find all font URLs in the CSS
    urls = re.findall(r'url\((https://fonts.gstatic.com[^)]+)\)', css)
    for font_url in set(urls): # use set to avoid downloading same file twice
        filename = font_url.split('/')[-1]
        local_path = os.path.join(FONTS_DIR, filename)
        
        if not os.path.exists(local_path):
            print(f"Downloading {filename}...")
            font_req = urllib.request.Request(font_url, headers=headers)
            with urllib.request.urlopen(font_req) as font_res:
                with open(local_path, 'wb') as f:
                    f.write(font_res.read())
        
        # Replace the remote URL with local path in the CSS
        # The CSS will be injected into critical.css, so the path is relative to the CSS file
        # or absolute to the theme. Let's use relative: ../fonts/
        css = css.replace(font_url, f"../fonts/{filename}")
    
    combined_css += css + "\n"

# Write the new CSS to a file
local_css_path = os.path.join(FONTS_DIR, 'local-fonts.css')
with open(local_css_path, 'w') as f:
    f.write(combined_css)

print("Fonts downloaded and CSS generated!")
