import ftplib
import urllib.request
import os
import re

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
    
    DB_NAME = secrets.get('DB_NAME')
    DB_USER = secrets.get('DB_USER')
    DB_PASS = secrets.get('DB_PASS')
    DB_HOST = secrets.get('DB_HOST')
except Exception as e:
    print(f"Error loading secrets: {e}")
    exit(1)

# Generate live wp-config
with open('./wp-config.php', 'r') as f:
    config = f.read()

config = re.sub(r"define\(\s*'DB_NAME',\s*'[^']*'\s*\);", f"define( 'DB_NAME', '{DB_NAME}' );", config)
config = re.sub(r"define\(\s*'DB_USER',\s*'[^']*'\s*\);", f"define( 'DB_USER', '{DB_USER}' );", config)
config = re.sub(r"define\(\s*'DB_PASSWORD',\s*'[^']*'\s*\);", f"define( 'DB_PASSWORD', '{DB_PASS}' );", config)
config = re.sub(r"define\(\s*'DB_HOST',\s*'[^']*'\s*\);", f"define( 'DB_HOST', '{DB_HOST}' );", config)

with open('./wp-config-live.php', 'w') as f:
    f.write(config)

ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)
ftp.cwd('chithramaya.charnithi.com')

print("Uploading zip file (this may take a minute)...")
with open('./chitramaya_wp.zip', 'rb') as f:
    ftp.storbinary('STOR chitramaya_wp.zip', f)

print("Uploading unzip.php (as update_theme_assets.php)...")
with open('./update_theme_assets.php', 'rb') as f:
    ftp.storbinary('STOR update_theme_assets.php', f)

print("Uploading wp-config.php...")
with open('./wp-config-live.php', 'rb') as f:
    ftp.storbinary('STOR wp-config.php', f)

ftp.quit()
os.remove('./wp-config-live.php')

print("Triggering extraction on live server...")
req = urllib.request.Request("https://chithramaya.charnithi.com/update_theme_assets.php", headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'})
try:
    response = urllib.request.urlopen(req)
    print("Unzip Response:", response.read().decode('utf-8'))
except Exception as e:
    print(f"Error triggering unzip: {e}")
