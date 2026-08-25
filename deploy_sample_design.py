import ftplib
import os
import urllib.request

try:
    with open('.ftp-secret', 'r') as f:
        secrets = {}
        for line in f:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                secrets[k] = v.strip('"')
    FTP_HOST = secrets.get('FTP_HOST')
    FTP_USER = secrets.get('FTP_USER')
    FTP_PASS = secrets.get('FTP_PASS')
except Exception as e:
    print(f"Error loading secrets: {e}")
    exit(1)

print(f"Connecting to FTP {FTP_HOST}...")
ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)
ftp.cwd('chithramaya.charnithi.com')

# Make sure sample-design directory exists
try:
    ftp.mkd('sample-design')
    print("Created remote directory: sample-design")
except ftplib.error_perm:
    print("Remote directory sample-design already exists")

# Files mapping: (local_file, remote_file)
deployments = [
    # 1. sample-design directory (so https://chithramaya.charnithi.com/sample-design works)
    ('chitramaya/design.html', 'sample-design/index.html'),
    ('chitramaya/artistic-photo.webp', 'sample-design/artistic-photo.webp'),
    ('chitramaya/artistic-photo.png', 'sample-design/artistic-photo.png'),
    ('chitramaya/camera.webp', 'sample-design/camera.webp'),
    ('chitramaya/camera.png', 'sample-design/camera.png'),

    # 2. Root sample-design.html (so https://chithramaya.charnithi.com/sample-design.html works)
    ('chitramaya/design.html', 'sample-design.html'),
    ('chitramaya/artistic-photo.webp', 'artistic-photo.webp'),
    ('chitramaya/artistic-photo.png', 'artistic-photo.png'),
    ('chitramaya/camera.webp', 'camera.webp'),
    ('chitramaya/camera.png', 'camera.png'),

    # 3. Theme copy
    ('chitramaya/design.html', 'wp-content/themes/chitramaya/design.html')
]

for local_path, remote_path in deployments:
    if os.path.exists(local_path):
        print(f"Uploading {local_path} -> {remote_path}...")
        with open(local_path, 'rb') as f:
            ftp.storbinary(f'STOR {remote_path}', f)
    else:
        print(f"Warning: {local_path} not found locally!")

ftp.quit()
print("\nDeploy completed successfully!")

# Verify Live HTTP status
print("\nVerifying live deployment endpoints...")
urls_to_test = [
    "https://chithramaya.charnithi.com/sample-design",
    "https://chithramaya.charnithi.com/sample-design/",
    "https://chithramaya.charnithi.com/sample-design.html"
]

for url in urls_to_test:
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        res = urllib.request.urlopen(req)
        print(f"✓ {url} -> Status {res.status} OK (Content-Length: {len(res.read())} bytes)")
    except Exception as e:
        print(f"✗ {url} -> Error: {e}")
