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
    DB_NAME  = secrets.get('DB_NAME')
    DB_USER  = secrets.get('DB_USER')
    DB_PASS  = secrets.get('DB_PASS')
    DB_HOST  = secrets.get('DB_HOST', 'localhost')
except Exception as e:
    print(f"Error loading secrets: {e}")
    exit(1)

SQL_FILE = '../../chitramaya_dump_live.sql'

# Perform spelling correction on the SQL dump before upload
if os.path.exists(SQL_FILE):
    print("Performing Thalam/Chitramaya spelling corrections on SQL dump...")
    with open(SQL_FILE, 'r', encoding='utf-8', errors='ignore') as f:
        sql_data = f.read()
    
    # Replace page slug and page title
    sql_data = sql_data.replace("'talam-studio'", "'thalam-studio'")
    sql_data = sql_data.replace("'Talam Studio'", "'Thalam Studio'")
    sql_data = sql_data.replace("talam-studio", "thalam-studio")
    sql_data = sql_data.replace("Talam Studio", "Thalam Studio")
    
    with open(SQL_FILE, 'w', encoding='utf-8') as f:
        f.write(sql_data)

# Generate a one-time PHP importer that reads and executes the SQL, then self-deletes
importer_php = f"""<?php
$conn = new mysqli('{DB_HOST}', '{DB_USER}', '{DB_PASS}', '{DB_NAME}');
if ($conn->connect_error) {{ die('DB connect failed: ' . $conn->connect_error); }}
$sql = file_get_contents(__DIR__ . '/chitramaya_dump_live.sql');
if (!$sql) {{ die('SQL file not found'); }}
$conn->multi_query($sql);
do {{ $conn->store_result(); }} while ($conn->next_result());
$conn->close();
unlink(__FILE__);
unlink(__DIR__ . '/chitramaya_dump_live.sql');
echo 'DB import complete. Files cleaned up.';
?>"""

with open('../../db_import.php', 'w') as f:
    f.write(importer_php)

ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)
ftp.cwd('chitramaya.charnithi.com')

print("Uploading SQL dump...")
with open(SQL_FILE, 'rb') as f:
    ftp.storbinary('STOR chitramaya_dump_live.sql', f)

print("Uploading DB importer...")
with open('../../db_import.php', 'rb') as f:
    ftp.storbinary('STOR db_import.php', f)

ftp.quit()
os.remove('../../db_import.php')

print("Triggering remote DB import...")
req = urllib.request.Request(
    "http://chitramaya.charnithi.com/db_import.php",
    headers={'User-Agent': 'Mozilla/5.0'}
)
try:
    response = urllib.request.urlopen(req, timeout=60)
    print("DB Import Response:", response.read().decode('utf-8'))
except Exception as e:
    print(f"Error triggering DB import: {e}")
