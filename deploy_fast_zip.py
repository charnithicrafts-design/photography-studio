import ftplib
import os
import zipfile
import urllib.request
import ssl

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

# 1. Zip the necessary folders
print("Creating deploy.zip (compressing files locally)...")
with zipfile.ZipFile('deploy.zip', 'w', zipfile.ZIP_DEFLATED) as zipf:
    dirs_to_zip = [
        'chitramaya'
    ]
    for d in dirs_to_zip:
        for root, dirs, files in os.walk(d):
            # Exclude unwanted directories
            dirs[:] = [dir_name for dir_name in dirs if dir_name not in ['.git', '.DS_Store', 'node_modules']]
            for file in files:
                if file not in ['.git', '.DS_Store']:
                    file_path = os.path.join(root, file)
                    # We need to structure it so it extracts into wp-content/themes/chitramaya
                    # In sivasakthi, the root was wp-content. Here the root is chitramaya.
                    # We want chitramaya/foo to become wp-content/themes/chitramaya/foo inside the zip
                    archive_path = 'wp-content/themes/' + file_path
                    zipf.write(file_path, archive_path)

# 2. Create the unzip & cache clear script
unzip_php_code = """<?php
// 1. Extract ZIP
$zip = new ZipArchive;
if ($zip->open('deploy.zip') === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo 'SUCCESS: Files extracted. ';
} else {
    echo 'FAILED to extract zip. ';
}

// 2. Self-Destruct
unlink('deploy.zip');
unlink(__FILE__);
?>"""

with open('deploy_unzip.php', 'w') as f:
    f.write(unzip_php_code)

# 3. Upload via FTP
print("Uploading deploy.zip and deploy_unzip.php...")
ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)
ftp.cwd('chithramaya.charnithi.com')

with open('deploy.zip', 'rb') as f:
    ftp.storbinary('STOR deploy.zip', f)
with open('deploy_unzip.php', 'rb') as f:
    ftp.storbinary('STOR deploy_unzip.php', f)

ftp.quit()

# 4. Trigger unzip via HTTP
print("Triggering extraction on server...")
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE
try:
    req = urllib.request.Request('https://chithramaya.charnithi.com/deploy_unzip.php', headers={'User-Agent': 'Mozilla/5.0'})
    response = urllib.request.urlopen(req, context=ctx)
    print("Server Response:", response.read().decode('utf-8'))
except Exception as e:
    print(f"Extraction failed to trigger: {e}")

# 5. Cleanup locally
os.remove('deploy.zip')
os.remove('deploy_unzip.php')
print("Fast Deploy complete!")
