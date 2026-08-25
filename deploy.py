import ftplib
import os
import zipfile
import urllib.request
import ssl
import argparse
import sys

# 1. Parse Environment
parser = argparse.ArgumentParser(description='Deploy Chithramaya Framework')
parser.add_argument('--env', choices=['staging', 'prod'], required=True, help='Target environment (staging or prod)')
args = parser.parse_args()

print(f"=== INITIALIZING {args.env.upper()} DEPLOYMENT ===")

# 2. Load Environment Secrets
secret_file = f".ftp-secret.{args.env}"
try:
    with open(secret_file, 'r') as f:
        secrets = {}
        for line in f:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                secrets[k] = v.strip('"')
    FTP_HOST = secrets.get('FTP_HOST')
    FTP_USER = secrets.get('FTP_USER')
    FTP_PASS = secrets.get('FTP_PASS')
    TARGET_DIR = secrets.get('TARGET_DIR', '/')
    TRIGGER_URL = secrets.get('TRIGGER_URL')
except Exception as e:
    print(f"Error loading {secret_file}: {e}")
    sys.exit(1)

import subprocess

# 3. Compile CSS before deployment
print("Compiling CSS...")
try:
    subprocess.run([sys.executable, 'build_css.py'], check=True)
except Exception as e:
    print(f"CSS Compilation failed: {e}")
    sys.exit(1)

# 4. Zip the necessary folders
print("Creating deploy.zip (compressing files locally)...")
with zipfile.ZipFile('deploy.zip', 'w', zipfile.ZIP_DEFLATED) as zipf:
    dirs_to_zip = ['chitramaya']
    for d in dirs_to_zip:
        for root, dirs, files in os.walk(d):
            dirs[:] = [dir_name for dir_name in dirs if dir_name not in ['.git', '.DS_Store', 'node_modules']]
            for file in files:
                if file not in ['.git', '.DS_Store']:
                    file_path = os.path.join(root, file)
                    archive_path = 'wp-content/themes/' + file_path
                    zipf.write(file_path, archive_path)

# 4. Create the unzip script
unzip_php_code = """<?php
$zip = new ZipArchive;
if ($zip->open('deploy.zip') === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo 'SUCCESS: Files extracted. ';
} else {
    echo 'FAILED to extract zip. ';
}
unlink('deploy.zip');
unlink(__FILE__);
?>"""

with open('deploy_unzip.php', 'w') as f:
    f.write(unzip_php_code)

# 5. Upload via FTP
print(f"Uploading to {FTP_HOST}...")
try:
    ftp = ftplib.FTP(FTP_HOST)
    ftp.login(FTP_USER, FTP_PASS)
    if TARGET_DIR != '/':
        ftp.cwd(TARGET_DIR)
    
    with open('deploy.zip', 'rb') as f:
        ftp.storbinary('STOR deploy.zip', f)
    with open('deploy_unzip.php', 'rb') as f:
        ftp.storbinary('STOR deploy_unzip.php', f)
    
    ftp.quit()
except Exception as e:
    print(f"FTP Upload Failed: {e}")
    # Don't exit yet, clean up local files first

# 6. Trigger unzip via HTTP
print("Triggering extraction on server...")
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE
try:
    req = urllib.request.Request(TRIGGER_URL, headers={'User-Agent': 'Mozilla/5.0'})
    response = urllib.request.urlopen(req, context=ctx)
    print("Server Response:", response.read().decode('utf-8'))
except Exception as e:
    print(f"Extraction failed to trigger: {e}")

# 7. Cleanup locally
if os.path.exists('deploy.zip'):
    os.remove('deploy.zip')
if os.path.exists('deploy_unzip.php'):
    os.remove('deploy_unzip.php')
print(f"=== {args.env.upper()} DEPLOYMENT COMPLETE ===")
