import ftplib
import urllib.request
import os
import secrets

try:
    with open('.ftp-secret.staging', 'r') as f:
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

SQL_FILE = './chitramaya_dump_live.sql'

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
    sql_data = sql_data.replace("Chitramaya", "Chithramaya")
    sql_data = sql_data.replace("Chitra<br>maya", "Chithra<br>maya")
    
    with open(SQL_FILE, 'w', encoding='utf-8') as f:
        f.write(sql_data)

# Parse host and port
db_host_clean = DB_HOST.split(':')[0] if ':' in DB_HOST else DB_HOST
db_port_clean = int(DB_HOST.split(':')[1]) if ':' in DB_HOST else 3306

# Generate a secure one-time token for remote import execution
import_token = secrets.token_urlsafe(32)

# Generate a one-time PHP importer that reads and executes the SQL, then self-deletes
importer_php = "<?php\n" \
               "if (!isset($_GET['token']) || $_GET['token'] !== '" + import_token + "') {\n" \
               "    http_response_code(403);\n" \
               "    die('Forbidden: Invalid import token.');\n" \
               "}\n" \
               "error_reporting(E_ALL);\n" \
               "ini_set('display_errors', 1);\n" \
               "@ini_set('memory_limit', '512M');\n" \
               "@set_time_limit(300);\n\n" \
               f"    $conn = new mysqli('{db_host_clean}', '{DB_USER}', '{DB_PASS}', '{DB_NAME}', {db_port_clean});\n" \
               "    $prefix = 'wp_';\n" \
               "\n" \
               "if ($conn->connect_error) {\n" \
               "    die('DB connect failed: ' . $conn->connect_error);\n" \
               "}\n\n" \
               "// 1. Read SQL dump and rewrite table prefixes to match active live prefix\n" \
               "$sql = @file_get_contents(__DIR__ . '/chitramaya_dump_live.sql');\n" \
               "if ($sql && $prefix !== 'wp_') {\n" \
               "    $sql = preg_replace('/(?<=\\b|\\`)(wp_)(?=[a-zA-Z0-9_]+)/', $prefix, $sql);\n" \
               "}\n\n" \
               "// 2. Import SQL dump into active prefix tables\n" \
               "if ($sql) {\n" \
               "    @$conn->multi_query($sql);\n" \
               "    while (@$conn->more_results()) {\n" \
               "        @$conn->next_result();\n" \
               "        if ($res = @$conn->store_result()) { @$res->free(); }\n" \
               "    }\n" \
               "}\n\n" \
               "$conn->close();\n" \
               "@unlink(__FILE__);\n" \
               "@unlink(__DIR__ . '/chitramaya_dump_live.sql');\n" \
               "echo 'DB import complete for prefix: ' . $prefix;\n" \
               "?>"

with open('./db_import.php', 'w') as f:
    f.write(importer_php)

print("Connecting securely via FTPS (FTP over TLS)...")
ftp = ftplib.FTP_TLS(timeout=30)
ftp.connect(FTP_HOST, 21)
ftp.auth()
ftp.login(FTP_USER, FTP_PASS)
ftp.prot_p()  # Enforce TLS encryption for both control and data streams
ftp.cwd('/')

print("Uploading SQL dump securely...")
with open(SQL_FILE, 'rb') as f:
    ftp.storbinary('STOR chitramaya_dump_live.sql', f)

print("Uploading tokenized DB importer...")
with open('./db_import.php', 'rb') as f:
    ftp.storbinary('STOR db_import.php', f)

ftp.quit()
os.remove('./db_import.php')

print("Triggering remote DB import with token...")
req = urllib.request.Request(
    f"https://chithramaya.charnithi.com/db_import.php?token={import_token}",
    headers={'User-Agent': 'Mozilla/5.0'}
)
try:
    response = urllib.request.urlopen(req, timeout=60)
    print("DB Import Response:", response.read().decode('utf-8'))
except urllib.error.HTTPError as e:
    print(f"HTTP Error {e.code}: {e.read().decode('utf-8', errors='ignore')}")
except Exception as e:
    print(f"Error triggering DB import: {e}")

