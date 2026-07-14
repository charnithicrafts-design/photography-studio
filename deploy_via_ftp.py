import ftplib
import os

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

ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)

print("Connecting to FTP...")
ftp.cwd('chitramaya.charnithi.com')

# Define local-to-remote mapping
files_to_upload = [
    # Theme files
    ('chitramaya/template-chitramaya.php', 'wp-content/themes/chitramaya/template-chitramaya.php'),
    ('chitramaya/template-talam.php', 'wp-content/themes/chitramaya/template-talam.php'),
    ('chitramaya/style.css', 'wp-content/themes/chitramaya/style.css'),
    ('chitramaya/functions.php', 'wp-content/themes/chitramaya/functions.php'),
    ('chitramaya/chitramaya-landing.html', 'wp-content/themes/chitramaya/chitramaya-landing.html'),
    ('chitramaya/talam-landing.html', 'wp-content/themes/chitramaya/talam-landing.html'),
    
    # Root files (optional but good for consistency)
    ('chitramaya/chitramaya-landing.html', 'chitramaya-landing.html'),
    ('chitramaya/talam-landing.html', 'talam-landing.html'),
]

for local_path, remote_path in files_to_upload:
    if os.path.exists(local_path):
        print(f"Uploading {local_path} to {remote_path}...")
        try:
            with open(local_path, 'rb') as f:
                ftp.storbinary(f'STOR {remote_path}', f)
            print(f"Successfully uploaded {remote_path}")
        except Exception as e:
            print(f"Failed to upload {remote_path}: {e}")
    else:
        print(f"Local file {local_path} not found!")

ftp.quit()
print("Direct FTP Deploy complete!")
