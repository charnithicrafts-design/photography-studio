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
ftp.cwd('chithramaya.charnithi.com/wp-content')

try:
    with open('live_debug.log', 'wb') as f:
        ftp.retrbinary('RETR debug.log', f.write)
    print("Downloaded debug.log.")
except Exception as e:
    print("Error:", e)
    files = ftp.nlst()
    print("Files in wp-content:", files)

ftp.quit()
