import os
import sys
import ftplib
import urllib.request
import traceback
import re

# Path to the WordPress root
WP_ROOT = os.path.abspath(os.path.join(os.path.dirname(__file__), '../../..'))
if not os.path.exists(os.path.join(WP_ROOT, 'wp-settings.php')):
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
    
    DB_NAME = secrets.get('DB_NAME')
    DB_USER = secrets.get('DB_USER')
    DB_PASS = secrets.get('DB_PASS')
    DB_HOST = secrets.get('DB_HOST', 'localhost')
except Exception as e:
    print(f"Error loading .ftp-secret: {e}")
    sys.exit(1)

TARGET_DIR = 'chitramaya.charnithi.com'
LIVE_URL = 'http://chitramaya.charnithi.com'

EXCLUDE_DIRS = ['themes/photography studio', '.git']
EXCLUDE_FILES = ['wp-config.php', 'chitramaya_wp.zip', 'unzip.php', 'chitramaya_dump.sql', 'ftp_upload_zip_subdomain.py']

def upload_file(ftp, local_path, remote_path):
    remote_dir = os.path.dirname(remote_path)
    base_dir = ftp.pwd()
    
    if remote_dir:
        try:
            ftp.cwd(remote_dir)
        except ftplib.error_perm:
            parts = remote_dir.replace("\\", "/").split('/')
            for p in parts:
                if not p: continue
                try:
                    ftp.cwd(p)
                except ftplib.error_perm:
                    try:
                        ftp.mkd(p)
                        ftp.cwd(p)
                    except:
                        pass
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
    except Exception as e:
        ftp.mkd(TARGET_DIR)
        ftp.cwd(TARGET_DIR)
            
    # Sync WP installation (File by file, CharNithi style)
    print(f"Syncing WordPress core from {WP_ROOT}...")
    for root, dirs, files in os.walk(WP_ROOT):
        dirs[:] = [d for d in dirs if not any(x in os.path.join(root, d).replace('\\', '/') for x in EXCLUDE_DIRS)]
        for file in files:
            if file in EXCLUDE_FILES:
                continue
            local_path = os.path.join(root, file)
            remote_path = os.path.relpath(local_path, WP_ROOT).replace("\\", "/")
            if any(remote_path.endswith(f) for f in EXCLUDE_FILES):
                continue
            upload_file(ftp, local_path, remote_path)
            
    # Programmatically setup wp-config.php if DB credentials exist
    if DB_NAME and DB_USER and DB_PASS:
        print("\nConfiguring live wp-config.php securely...")
        local_wp_config_path = os.path.join(WP_ROOT, 'wp-config.php')
        with open(local_wp_config_path, 'r') as f:
            config_content = f.read()

        # Fix regex to use [^']* to match empty strings
        config_content = re.sub(r"define\(\s*'DB_NAME',\s*'[^']*'\s*\);", f"define( 'DB_NAME', '{DB_NAME}' );", config_content)
        config_content = re.sub(r"define\(\s*'DB_USER',\s*'[^']*'\s*\);", f"define( 'DB_USER', '{DB_USER}' );", config_content)
        config_content = re.sub(r"define\(\s*'DB_PASSWORD',\s*'[^']*'\s*\);", f"define( 'DB_PASSWORD', '{DB_PASS}' );", config_content)
        config_content = re.sub(r"define\(\s*'DB_HOST',\s*'[^']*'\s*\);", f"define( 'DB_HOST', '{DB_HOST}' );", config_content)

        temp_config_path = '/tmp/wp-config-live.php'
        with open(temp_config_path, 'w') as f:
            f.write(config_content)

        print("Uploading dynamically generated wp-config.php...")
        with open(temp_config_path, 'rb') as f:
            ftp.storbinary('STOR wp-config.php', f)
            
        os.remove(temp_config_path)

    print("\nFTP Deployment complete!")
    ftp.quit()
    
    print("\nTriggering Secure Database Import...")
    import_url = f"{LIVE_URL}/import-db.php"
    try:
        req = urllib.request.Request(import_url, headers={'User-Agent': 'Mozilla/5.0'})
        response = urllib.request.urlopen(req)
        print("Output:", response.read().decode('utf-8'))
    except Exception as e:
        print(f"Error triggering import-db: {e}")

except Exception as e:
    print(f"Deployment failed: {e}")
    traceback.print_exc()
