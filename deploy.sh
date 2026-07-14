#!/bin/bash

# ==============================================================================
# CHITRAMAYA DEPLOYMENT PIPELINE
# Automated script for human teams and future AI agents.
# 
# Process:
# 1. Syncs the sprint workspace theme to the active WordPress theme directory.
# 2. Generates a fresh SQL dump with live URLs for production.
# 3. Compresses the entire WordPress installation (excluding dev configs/git).
# 4. Uploads the payload to FTP and dynamically provisions wp-config.php.
# 5. Executes a remote extraction for lightning-fast deployments.
# ==============================================================================

set -e

echo "[1/5] Syncing workspace theme to active WordPress directory..."
cp -r chitramaya/* ../../wp-content/themes/chitramaya/

echo "[2/5] Exporting live SQL dump..."
cd ../..
# Generates a database dump with the production URL
php -d memory_limit=512M "themes/photography studio/wp-cli.phar" search-replace 'http://localhost:8080' 'http://chitramaya.charnithi.com' --export=chitramaya_dump_live.sql

echo "[3/5] Compressing WordPress build..."
rm -f chitramaya_wp.zip
zip -rq chitramaya_wp.zip . -x "*.git*" -x "wp-config.php" -x "chitramaya_wp.zip" -x "chitramaya_dump.sql"

echo "[4/5] Initiating FTP Payload Upload & Config Provisioning..."
# upload_zip.py handles FTP transfer of the zip, unzip.php, and live wp-config.php
python "themes/photography studio/upload_zip.py"

echo "[5/5] Deployment complete! The server is unpacking the archive."
