#!/bin/bash

# ==============================================================================
# CHITRAMAYA DEPLOYMENT PIPELINE
# Automated script for human teams and future AI agents.
#
# Run from: themes/photography studio/
#
# Process:
# 1. Syncs the sprint workspace theme to the active WordPress theme directory.
# 2. Generates a fresh SQL dump with live URLs for production.
# 3. Compresses the entire WordPress installation (excluding dev configs/git).
# 4. Uploads the payload to FTP and dynamically provisions wp-config.php.
# 5. Executes a remote extraction for lightning-fast deployments.
# ==============================================================================

set -e

# Resolve paths relative to this script's location
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
WP_ROOT="$SCRIPT_DIR"

echo "[1/5] Syncing workspace theme to active WordPress directory..."
cp -a "$SCRIPT_DIR/chitramaya/." "$WP_ROOT/wp-content/themes/chitramaya/"

echo "[2/5] Exporting live SQL dump..."
php -d memory_limit=512M "$SCRIPT_DIR/wp-cli.phar" \
  --path="$WP_ROOT" \
  search-replace 'http://localhost:8080' 'http://chitramaya.charnithi.com' \
  --export="$WP_ROOT/chitramaya_dump_live.sql"

echo "[2b/5] Uploading SQL dump for remote import..."
python "$SCRIPT_DIR/upload_sql.py"

echo "[3/5] Deploying files directly via FTP..."
python "$SCRIPT_DIR/deploy_via_ftp.py"

echo "[4/5] Deployment complete! Changed files and database are updated."
