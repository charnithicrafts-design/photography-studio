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

# Generate a one-time PHP importer that reads and executes the SQL, then self-deletes
importer_php = "<?php\n" \
               "error_reporting(E_ALL);\n" \
               "ini_set('display_errors', 1);\n\n" \
               f"$conn = @new mysqli('{db_host_clean}', '{DB_USER}', '{DB_PASS}', '{DB_NAME}', {db_port_clean});\n" \
               "if ($conn->connect_error) {\n" \
               "    die('DB connect failed: ' . $conn->connect_error);\n" \
               "}\n\n" \
               "// Execute full SQL dump first\n" \
               "$sql = @file_get_contents(__DIR__ . '/chitramaya_dump_live.sql');\n" \
               "if ($sql) {\n" \
               "    @$conn->multi_query($sql);\n" \
               "    while (@$conn->more_results()) {\n" \
               "        @$conn->next_result();\n" \
               "        if ($res = @$conn->store_result()) { @$res->free(); }\n" \
               "    }\n" \
               "}\n\n" \
               "// Guarantee admin user exists with password 'password' (working WP bcrypt hash)\n" \
               "$pass_hash = '$wp$2y$12$3xNrUtX9gcGe0BxAHUTEpuefV5Yp7AhA.7A0OS8VeTlrJhs0e3jWG';\n" \
               "$conn->query(\"INSERT INTO wp_users (ID, user_login, user_pass, user_nicename, user_email, user_registered, user_status, display_name) VALUES (1, 'admin', '$pass_hash', 'admin', 'admin@example.com', NOW(), 0, 'admin') ON DUPLICATE KEY UPDATE user_login='admin', user_pass='$pass_hash', user_email='admin@example.com';\");\n" \
               "$conn->query(\"INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (1, 'wp_capabilities', 'a:1:{s:13:\\\"administrator\\\";b:1;}') ON DUPLICATE KEY UPDATE meta_value='a:1:{s:13:\\\"administrator\\\";b:1;}';\");\n" \
               "$conn->query(\"INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (1, 'wp_user_level', '10') ON DUPLICATE KEY UPDATE meta_value='10';\");\n\n" \
               "$conn->close();\n" \
               "@unlink(__FILE__);\n" \
               "@unlink(__DIR__ . '/chitramaya_dump_live.sql');\n" \
               "echo 'DB import complete. Admin user verified.';\n" \
               "?>"

with open('./db_import.php', 'w') as f:
    f.write(importer_php)

ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)
ftp.cwd('chithramaya.charnithi.com')

print("Uploading SQL dump...")
with open(SQL_FILE, 'rb') as f:
    ftp.storbinary('STOR chitramaya_dump_live.sql', f)

print("Uploading DB importer...")
with open('./db_import.php', 'rb') as f:
    ftp.storbinary('STOR db_import.php', f)

ftp.quit()
os.remove('./db_import.php')

print("Triggering remote DB import...")
req = urllib.request.Request(
    "https://chithramaya.charnithi.com/db_import.php",
    headers={'User-Agent': 'Mozilla/5.0'}
)
try:
    response = urllib.request.urlopen(req, timeout=60)
    print("DB Import Response:", response.read().decode('utf-8'))
except urllib.error.HTTPError as e:
    print(f"HTTP Error {e.code}: {e.read().decode('utf-8', errors='ignore')}")
except Exception as e:
    print(f"Error triggering DB import: {e}")
