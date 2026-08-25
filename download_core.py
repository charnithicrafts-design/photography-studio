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
ftp.cwd('chithramaya.charnithi.com')

try:
    with open('live_index.php', 'wb') as f:
        ftp.retrbinary('RETR index.php', f.write)
    print("Downloaded index.php.")
except Exception as e:
    print("Error:", e)

try:
    with open('live_wp-settings.php', 'wb') as f:
        ftp.retrbinary('RETR wp-settings.php', f.write)
    print("Downloaded wp-settings.php.")
except Exception as e:
    print("Error:", e)

ftp.quit()
