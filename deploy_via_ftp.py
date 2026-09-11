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
ftp.cwd('chithramaya.charnithi.com')

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

# Directories to never upload to the server
SKIP_DIR_SEGMENTS = [
    'node_modules',
    '.git',
    'tools',
    '__pycache__',
    '.cache',
    'src',          # Vite source — only dist/ is needed
    'vendor',       # Composer vendor (static on server)
    'tests',
    '.psalm',
]

# Automatically gather plugin files (chitramaya-proofing)
plugin_local_dir = 'wp-content/plugins/chitramaya-proofing'
if os.path.exists(plugin_local_dir):
    for root, dirs, files in os.walk(plugin_local_dir):
        # Prune walk into skip dirs in-place (prevents descending into them)
        dirs[:] = [d for d in dirs if d not in SKIP_DIR_SEGMENTS]
        # Also skip if any path segment matches
        if any(seg in root.replace('\\', '/').split('/') for seg in SKIP_DIR_SEGMENTS):
            continue
        for file in files:
            if file.startswith('.'):
                continue
            local_path = os.path.join(root, file)
            local_path = local_path.replace('\\', '/')
            remote_path = local_path  # Already has wp-content/plugins/... path
            files_to_upload.append((local_path, remote_path))

# Root files (optional but good for consistency)
files_to_upload.append(('.htaccess', '.htaccess'))
files_to_upload.append(('favicon.ico', 'favicon.ico'))
files_to_upload.append(('chitramaya/chitramaya-landing.html', 'chitramaya-landing.html'))
files_to_upload.append(('chitramaya/thalam-landing.html', 'thalam-landing.html'))

import time

def get_ftp():
    f = ftplib.FTP(FTP_HOST, timeout=30)
    f.login(FTP_USER, FTP_PASS)
    f.cwd('chithramaya.charnithi.com')
    return f

ftp = get_ftp()
print("Connected to FTP.")

for local_path, remote_path in files_to_upload:
    if not os.path.exists(local_path):
        continue

    uploaded = False
    for attempt in range(3):
        try:
            # Create remote directory if needed
            remote_dir = os.path.dirname(remote_path)
            if remote_dir:
                dirs = remote_dir.split('/')
                current_dir = ''
                for d in dirs:
                    current_dir = f"{current_dir}/{d}" if current_dir else d
                    try:
                        ftp.mkd(current_dir)
                    except ftplib.error_perm:
                        pass

            with open(local_path, 'rb') as f:
                ftp.storbinary(f'STOR {remote_path}', f)
            print(f"Uploaded: {remote_path}")
            uploaded = True
            break
        except Exception as e:
            print(f"Transfer error on {remote_path} (attempt {attempt+1}): {e}")
            try:
                ftp.close()
            except Exception:
                pass
            time.sleep(1)
            try:
                ftp = get_ftp()
            except Exception as conn_err:
                print(f"Reconnect failed: {conn_err}")
                time.sleep(2)

    if not uploaded:
        print(f"FAILED permanently to upload {remote_path}")

try:
    ftp.quit()
except Exception:
    ftp.close()

print("Direct FTP Deploy complete!")
