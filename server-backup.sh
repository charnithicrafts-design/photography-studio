#!/bin/bash
set -e

# ==============================================================================
# CHITRAMAYA AUTOMATED SERVER BACKUP
# Backs up the WordPress database and media uploads.
# Retention: 7 Days
# ==============================================================================

# Set the path to the WordPress root directory on the server
# By default, it uses the directory where this script is located
WP_ROOT="$(cd "$(dirname "$0")" && pwd)"
BACKUP_DIR="$WP_ROOT/backups"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
DB_BACKUP="$BACKUP_DIR/db_backup_$TIMESTAMP.sql"
UPLOADS_BACKUP="$BACKUP_DIR/uploads_backup_$TIMESTAMP.tar.gz"

echo "Starting Chitramaya Server Backup at $TIMESTAMP"

# 1. Ensure backup directory exists and is secured
mkdir -p "$BACKUP_DIR"
chmod 700 "$BACKUP_DIR"
# Prevent direct web access to the backups folder if placed in public_html
echo "deny from all" > "$BACKUP_DIR/.htaccess"

# 2. Database Backup (Requires wp-cli to be installed on the server)
echo "Exporting WordPress database..."
# If wp-cli is installed globally, use 'wp'. If using the phar, specify the path.
if command -v wp &> /dev/null; then
    wp --path="$WP_ROOT" db export "$DB_BACKUP" --allow-root
elif [ -f "$WP_ROOT/wp-cli.phar" ]; then
    php "$WP_ROOT/wp-cli.phar" --path="$WP_ROOT" db export "$DB_BACKUP"
else
    echo "ERROR: WP-CLI is not available. Please install WP-CLI to run DB backups."
    exit 1
fi

# 3. Uploads Directory Backup
echo "Compressing media uploads..."
if [ -d "$WP_ROOT/wp-content/uploads" ]; then
    tar -czf "$UPLOADS_BACKUP" -C "$WP_ROOT/wp-content" uploads
else
    echo "Warning: wp-content/uploads directory not found. Skipping."
fi

# 4. Retention Policy (Cleanup backups older than 7 days)
echo "Cleaning up backups older than 7 days..."
find "$BACKUP_DIR" -type f -name "db_backup_*.sql" -mtime +7 -exec rm {} \;
find "$BACKUP_DIR" -type f -name "uploads_backup_*.tar.gz" -mtime +7 -exec rm {} \;

echo "Backup completed successfully! Archives stored in $BACKUP_DIR"
