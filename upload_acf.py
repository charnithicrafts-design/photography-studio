import ftplib
import urllib.request
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
ftp.cwd('chitramaya.charnithi.com')

print("Uploading acf.zip (this may take a minute)...")
with open('acf.zip', 'rb') as f:
    ftp.storbinary('STOR acf.zip', f)

print("Uploading unzip_acf.php...")
with open('unzip_acf.php', 'rb') as f:
    ftp.storbinary('STOR unzip_acf.php', f)

ftp.quit()

print("Triggering unzip_acf.php on live server...")
req = urllib.request.Request("http://chitramaya.charnithi.com/unzip_acf.php", headers={'User-Agent': 'Mozilla/5.0'})
try:
    response = urllib.request.urlopen(req)
    print("Unzip Response:", response.read().decode('utf-8'))
except Exception as e:
    print(f"Error triggering unzip: {e}")
