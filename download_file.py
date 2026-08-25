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

try:
    ftp.cwd('chithramaya.charnithi.com')
    files = ftp.nlst()
    print("Files in root:", files)
    
    if 'error_log' in files:
        with open('live_error_log.txt', 'wb') as f:
            ftp.retrbinary('RETR error_log', f.write)
        print("Downloaded error_log.")
    
    with open('live_wp-config.php', 'wb') as f:
        ftp.retrbinary('RETR wp-config.php', f.write)
    print("Downloaded wp-config.php.")
    
except Exception as e:
    print("Error:", e)

ftp.quit()
