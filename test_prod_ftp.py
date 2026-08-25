import ftplib

try:
    ftp = ftplib.FTP('ftp.chithramaya.com')
    ftp.login('dev@chithramaya.com', 'MhvUB0peDEv8NvYIrCN8')
    print("Logged in successfully.")
    
    print("Current directory:", ftp.pwd())
    print("Listing directories:")
    ftp.retrlines('LIST')
    
    ftp.quit()
except Exception as e:
    print("FTP Error:", e)
