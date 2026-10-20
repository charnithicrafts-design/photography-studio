import ftplib
import urllib.request
import os
import secrets

try:
    with open('.ftp-secret.staging', 'r') as f:
        secrets_dict = {}
        for line in f:
            if '=' in line:
                k, v = line.strip().split('=', 1)
                secrets_dict[k] = v.strip('"')
    FTP_HOST = secrets_dict.get('FTP_HOST')
    FTP_USER = secrets_dict.get('FTP_USER')
    FTP_PASS = secrets_dict.get('FTP_PASS')
except Exception as e:
    print(f"Error loading secrets: {e}")
    exit(1)

print("Connecting securely via FTPS...")
ftp = ftplib.FTP_TLS(timeout=30)
ftp.connect(FTP_HOST, 21)
ftp.auth()
ftp.login(FTP_USER, FTP_PASS)
ftp.prot_p()
ftp.cwd('/')

print("Uploading acf.zip (this may take a minute)...")
with open('acf.zip', 'rb') as f:
    ftp.storbinary('STOR acf.zip', f)

print("Uploading unzip_acf.php...")
with open('unzip_acf.php', 'rb') as f:
    ftp.storbinary('STOR unzip_acf.php', f)

ftp.quit()

print("Triggering unzip_acf.php on live server...")
req = urllib.request.Request("https://chithramaya.charnithi.com/unzip_acf.php", headers={'User-Agent': 'Mozilla/5.0'})
try:
    response = urllib.request.urlopen(req)
    print("Unzip Response:", response.read().decode('utf-8'))
except Exception as e:
    print(f"Error triggering unzip: {e}")
