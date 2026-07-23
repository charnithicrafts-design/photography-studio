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

files_to_upload = []
# Automatically gather all files in the chitramaya theme folder
for root, dirs, files in os.walk('chitramaya'):
    for file in files:
        if file.startswith('.'):
            continue
        local_path = os.path.join(root, file)
        # Convert OS path separator to FTP path separator
        local_path = local_path.replace('\\', '/')
        remote_path = 'wp-content/themes/' + local_path
        files_to_upload.append((local_path, remote_path))

# Root files (optional but good for consistency)
files_to_upload.append(('chitramaya/chitramaya-landing.html', 'chitramaya-landing.html'))
files_to_upload.append(('chitramaya/thalam-landing.html', 'thalam-landing.html'))

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
        except Exception as e:
            print(f"Failed to upload {remote_path}: {e}")
    else:
        print(f"Local file {local_path} not found!")

ftp.quit()
print("Direct FTP Deploy complete!")
