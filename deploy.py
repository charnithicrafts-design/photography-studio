import os
import sys
import ftplib
import traceback

# Path to the WordPress root (since this script is in wp-content/themes/photography studio/)
WP_ROOT = os.path.abspath(os.path.join(os.path.dirname(__file__), '../../..'))
if not os.path.exists(os.path.join(WP_ROOT, 'wp-settings.php')):
    # Fallback if the path logic is slightly off
    WP_ROOT = os.path.abspath(os.path.join(os.path.dirname(__file__), '../..'))

# Load secret
try:
    with open('.ftp-secret', 'r') as f:
        lines = f.readlines()
        secrets = {}
        for line in lines:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                secrets[k] = v.strip('"')
    FTP_HOST = secrets.get('FTP_HOST', 'ftp.charnithi.com')
    FTP_USER = secrets.get('FTP_USER')
    FTP_PASS = secrets.get('FTP_PASS')
except Exception as e:
    print(f"Error loading .ftp-secret: {e}")
    sys.exit(1)

TARGET_DIR = 'chitramaya.charnithi.com'

EXCLUDE_DIRS = ['themes/photography studio', '.git']
EXCLUDE_FILES = ['wp-config.php', 'chitramaya_wp.zip', 'unzip.php', 'chitramaya_dump.sql', 'ftp_upload_zip_subdomain.py']

def upload_file(ftp, local_path, remote_path):
    remote_dir = os.path.dirname(remote_path)
    base_dir = ftp.pwd()
    
    # Ensure remote directory exists
    if remote_dir:
        try:
            ftp.cwd(remote_dir)
        except ftplib.error_perm:
            # Create directories recursively
            parts = remote_dir.replace("\\", "/").split('/')
            for p in parts:
                if not p: continue
                try:
                    ftp.cwd(p)
                except ftplib.error_perm:
                    try:
                        ftp.mkd(p)
                        ftp.cwd(p)
                    except Exception as e:
                        pass
    
    # Back to base dir
    ftp.cwd(base_dir)
    
    print(f"Uploading {local_path} to {remote_path}...")
    try:
        with open(local_path, 'rb') as f:
            ftp.storbinary(f'STOR {remote_path}', f)
    except Exception as e:
        print(f"Failed to upload {local_path}: {e}")

try:
    print(f"Connecting to FTP: {FTP_HOST}...")
    ftp = ftplib.FTP(FTP_HOST)
    ftp.login(FTP_USER, FTP_PASS)
    print("Connected successfully.")
    
    try:
        ftp.cwd(TARGET_DIR)
        print(f"Moved to {TARGET_DIR} directory.")
    except Exception as e:
        print(f"Warning: Could not move to {TARGET_DIR}. Creating it...")
        try:
            ftp.mkd(TARGET_DIR)
            ftp.cwd(TARGET_DIR)
        except:
            pass
            
    # Sync WP installation (File by file, CharNithi style)
    print(f"Syncing WordPress core from {WP_ROOT}...")
    for root, dirs, files in os.walk(WP_ROOT):
        # Apply exclusions
        dirs[:] = [d for d in dirs if not any(x in os.path.join(root, d).replace('\\', '/') for x in EXCLUDE_DIRS)]
        
        for file in files:
            if file in EXCLUDE_FILES:
                continue
            
            local_path = os.path.join(root, file)
            # Make remote path relative to WP_ROOT
            remote_path = os.path.relpath(local_path, WP_ROOT).replace("\\", "/")
            
            # Additional safety check against excluded file names
            if any(remote_path.endswith(f) for f in EXCLUDE_FILES):
                continue
                
            upload_file(ftp, local_path, remote_path)
                    
    print("\nDeployment complete! You can now visit http://chitramaya.charnithi.com/import-db.php to inject the database.")
    ftp.quit()

except Exception as e:
    print(f"Deployment failed: {e}")
    traceback.print_exc()
