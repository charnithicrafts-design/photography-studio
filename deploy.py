import ftplib
import os
import zipfile
import urllib.request
import ssl
import argparse
import sys
import secrets

# 1. Parse Environment
parser = argparse.ArgumentParser(description='Deploy Chithramaya Framework')
parser.add_argument('--env', choices=['staging', 'prod'], required=True, help='Target environment (staging or prod)')
args = parser.parse_args()

print(f"=== INITIALIZING {args.env.upper()} DEPLOYMENT ===")

# 2. Load Environment Secrets
secret_file = f".ftp-secret.{args.env}"
try:
    env_config = {}
    with open(secret_file, 'r') as f:
        for line in f:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                env_config[k] = v.strip('"')
    FTP_HOST = env_config.get('FTP_HOST')
    FTP_USER = env_config.get('FTP_USER')
    FTP_PASS = env_config.get('FTP_PASS')
    TARGET_DIR = env_config.get('TARGET_DIR', '/')
    TRIGGER_URL = env_config.get('TRIGGER_URL')
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

# 3.5 Run Preflight Release Gate
print("Running Chithramaya Pre-Flight Release Gate...")
try:
    subprocess.run([sys.executable, 'preflight.py'], check=True)
except Exception as e:
    print(f"Pre-flight gate check failed: {e}")
    sys.exit(1)

# 4. Zip the necessary folders
print("Creating deploy.zip (compressing files locally)...")
with zipfile.ZipFile('deploy.zip', 'w', zipfile.ZIP_DEFLATED) as zipf:
    
    # --- NEW: Add server config files to the root of the zip ---
    if os.path.exists('.htaccess'):
        zipf.write('.htaccess', '.htaccess')
        print("Included .htaccess configuration file.")

    if os.path.exists('robots.txt'):
        zipf.write('robots.txt', 'robots.txt')
        print("Included robots.txt configuration file.")

    if os.path.exists('favicon.ico'):
        zipf.write('favicon.ico', 'favicon.ico')
        print("Included favicon.ico root icon.")

    if os.path.exists('design-preview.html'):
        zipf.write('design-preview.html', 'design-preview.html')
        print("Included design-preview.html comparison page.")

    dirs_to_zip = ['chitramaya']
    for d in dirs_to_zip:
        for root, dirs, files in os.walk(d):
            dirs[:] = [dir_name for dir_name in dirs if dir_name not in ['.git', '.DS_Store', 'node_modules']]
            for file in files:
                if file not in ['.git', '.DS_Store']:
                    file_path = os.path.join(root, file)
                    archive_path = 'wp-content/themes/' + file_path
                    zipf.write(file_path, archive_path)

# 4. Create the secure unzip script with one-time execution token
deploy_token = secrets.token_urlsafe(32)
unzip_php_code = f"""<?php
if (!isset($_GET['token']) || $_GET['token'] !== '{deploy_token}') {{
    http_response_code(403);
    die('Forbidden: Invalid deployment token.');
}}
$zip = new ZipArchive;
if ($zip->open('deploy.zip') === TRUE) {{
    $zip->extractTo('./');
    $zip->close();
    echo 'SUCCESS: Files extracted. ';
}} else {{
    echo 'FAILED to extract zip. ';
}}
@unlink('deploy.zip');
@unlink(__FILE__);
?>"""

with open('deploy_unzip.php', 'w') as f:
    f.write(unzip_php_code)

# 5. Upload via FTPS (FTP over TLS)
print(f"Uploading securely to {FTP_HOST} via FTPS...")
try:
    ftp = ftplib.FTP_TLS(timeout=30)
    ftp.connect(FTP_HOST, 21)
    ftp.auth()
    ftp.login(FTP_USER, FTP_PASS)
    ftp.prot_p()  # Enforce TLS encryption on data connection
    if TARGET_DIR != '/':
        ftp.cwd(TARGET_DIR)
    
    with open('deploy.zip', 'rb') as f:
        ftp.storbinary('STOR deploy.zip', f)
    with open('deploy_unzip.php', 'rb') as f:
        ftp.storbinary('STOR deploy_unzip.php', f)
    
    ftp.quit()
    print("Secure FTPS transfer complete.")
except Exception as e:
    print(f"FTPS Upload Failed: {e}")
    # Don't exit yet, clean up local files first

# 6. Trigger unzip via HTTP with one-time token
print("Triggering secure extraction on server...")
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE
try:
    token_trigger_url = f"{TRIGGER_URL}?token={deploy_token}"
    req = urllib.request.Request(token_trigger_url, headers={'User-Agent': 'Mozilla/5.0'})
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
