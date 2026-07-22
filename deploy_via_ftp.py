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
    ('chitramaya/template-thalam.php', 'wp-content/themes/chitramaya/template-thalam.php'),
    ('chitramaya/template-thalam-baby.php', 'wp-content/themes/chitramaya/template-thalam-baby.php'),
    ('chitramaya/template-parts/global-nav.php', 'wp-content/themes/chitramaya/template-parts/global-nav.php'),
    ('chitramaya/style.css', 'wp-content/themes/chitramaya/style.css'),
    ('chitramaya/functions.php', 'wp-content/themes/chitramaya/functions.php'),
    ('chitramaya/theme.json', 'wp-content/themes/chitramaya/theme.json'),
    ('chitramaya/inc/acf-home.php', 'wp-content/themes/chitramaya/inc/acf-home.php'),
    ('chitramaya/inc/acf-thalam.php', 'wp-content/themes/chitramaya/inc/acf-thalam.php'),
    ('chitramaya/chitramaya-landing.html', 'wp-content/themes/chitramaya/chitramaya-landing.html'),
    ('chitramaya/thalam-landing.html', 'wp-content/themes/chitramaya/thalam-landing.html'),
    
    # Root files (optional but good for consistency)
    ('chitramaya/chitramaya-landing.html', 'chitramaya-landing.html'),
    ('chitramaya/thalam-landing.html', 'thalam-landing.html'),
]

for local_path, remote_path in files_to_upload:
    if os.path.exists(local_path):
        print(f"Uploading {local_path} to {remote_path}...")
        try:
            # Create remote directory if it doesn't exist
            remote_dir = os.path.dirname(remote_path)
            if remote_dir:
                dirs = remote_dir.split('/')
                current_dir = ''
                for d in dirs:
                    current_dir = f"{current_dir}/{d}" if current_dir else d
                    try:
                        ftp.mkd(current_dir)
                    except ftplib.error_perm:
                        pass # Directory already exists
                        
            with open(local_path, 'rb') as f:
                ftp.storbinary(f'STOR {remote_path}', f)
            print(f"Successfully uploaded {remote_path}")
        except Exception as e:
            print(f"Failed to upload {remote_path}: {e}")
    else:
        print(f"Local file {local_path} not found!")

ftp.quit()
print("Direct FTP Deploy complete!")
