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

print("Testing secure FTPS connection...")
ftp = ftplib.FTP_TLS(timeout=20)
ftp.connect(FTP_HOST, 21)
ftp.auth()
ftp.login(FTP_USER, FTP_PASS)
ftp.prot_p()

print("Root directory contents:")
ftp.dir()

print("\nChanging to chithramaya.charnithi.com...")
try:
    ftp.cwd('chithramaya.charnithi.com')
    print("Contents of chithramaya.charnithi.com:")
    ftp.dir()
except Exception as e:
    print("Could not cwd to chithramaya.charnithi.com:", e)
    
print("\nChanging to public_html (if exists)...")
try:
    ftp.cwd('/public_html')
    ftp.dir()
except:
    pass

ftp.quit()
