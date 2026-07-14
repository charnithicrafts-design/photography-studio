import os
import sys
import ftplib
import urllib.request
import traceback

# Load secret
try:
    with open('.ftp-secret', 'r') as f:
        lines = f.readlines()
        secrets = {}
        for line in lines:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                secrets[k] = v.strip('"')
    FTP_HOST = secrets.get('FTP_HOST', 'www.charnithi.com')
    FTP_USER = secrets.get('FTP_USER')
    FTP_PASS = secrets.get('FTP_PASS')
except Exception as e:
    print(f"Error loading .ftp-secret: {e}")
    print("Please create a .ftp-secret file with FTP_USER and FTP_PASS.")
    sys.exit(1)

# Files to upload
FILES_TO_UPLOAD = [
    '/tmp/chitramaya_wp.zip',
    '/tmp/unzip.php'
]

TARGET_DIR = 'chitramaya.charnithi.com'
LIVE_URL = 'http://chitramaya.charnithi.com'

try:
    print(f"Connecting to FTP: {FTP_HOST}...")
    ftp = ftplib.FTP(FTP_HOST)
    ftp.login(FTP_USER, FTP_PASS)
    print("Connected successfully.")
    
    try:
        ftp.cwd(TARGET_DIR)
        print(f"Moved to {TARGET_DIR} directory.")
    except Exception as e:
        print(f"Error: Could not move to {TARGET_DIR}: {e}")
        sys.exit(1)
            
    for file_path in FILES_TO_UPLOAD:
        if os.path.exists(file_path):
            filename = os.path.basename(file_path)
            print(f"Uploading {filename}...")
            with open(file_path, 'rb') as f:
                ftp.storbinary(f'STOR {filename}', f)
        else:
            print(f"Warning: {file_path} not found locally.")

    print("FTP Upload complete!")
    ftp.quit()
    
    print("\n[1/2] Triggering Remote Unzip Sequence...")
    unzip_url = f"{LIVE_URL}/unzip.php"
    try:
        req = urllib.request.Request(unzip_url, headers={'User-Agent': 'Mozilla/5.0'})
        response = urllib.request.urlopen(req)
        print("Output:", response.read().decode('utf-8'))
    except Exception as e:
        print(f"Error triggering unzip: {e}")
        
    print("\n[2/2] Triggering Secure Database Import...")
    import_url = f"{LIVE_URL}/import-db.php"
    try:
        req = urllib.request.Request(import_url, headers={'User-Agent': 'Mozilla/5.0'})
        response = urllib.request.urlopen(req)
        print("Output:", response.read().decode('utf-8'))
    except Exception as e:
        print(f"Error triggering import-db: {e}")
        
    print("\nChitramaya Deployment sequence finished successfully.")

except Exception as e:
    print(f"Deployment failed: {e}")
    traceback.print_exc()
