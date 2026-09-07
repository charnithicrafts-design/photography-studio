#!/bin/bash
# switch-branch.sh <branch-name>
# Checks out the git branch, creates a dedicated database for it, and imports the live dump.

if [ -z "$1" ]; then
    echo "Usage: ./switch-branch.sh <branch-name>"
    exit 1
fi

BRANCH_NAME=$1

# Switch or create the git branch
if git show-ref --verify --quiet refs/heads/$BRANCH_NAME; then
    echo "Switching to existing branch: $BRANCH_NAME"
    git checkout $BRANCH_NAME
else
    echo "Creating and switching to new branch: $BRANCH_NAME"
    git checkout -b $BRANCH_NAME
fi

# Ensure theme symlink is maintained
if [ ! -L "wp-content/themes/chitramaya" ]; then
    echo "Ensuring wp-content/themes/chitramaya is symlinked to ./chitramaya..."
    rm -rf wp-content/themes/chitramaya
    ln -s ../../chitramaya wp-content/themes/chitramaya
fi

# Determine the safe DB name based on our wp-config logic
# Lowercase, replace non-alphanumeric with _
SAFE_BRANCH=$(echo "$BRANCH_NAME" | tr '[:upper:]' '[:lower:]' | sed 's/[^a-zA-Z0-9_]/_/g')
DB_NAME="chitramaya_${SAFE_BRANCH}"

echo "Target database for this branch: $DB_NAME"

# Check if database exists
DB_EXISTS=$(mysql -u root -e "SHOW DATABASES LIKE '$DB_NAME';" | grep "$DB_NAME" > /dev/null; echo "$?")

if [ $DB_EXISTS -eq 0 ]; then
    echo "Database $DB_NAME already exists. Using existing DB."
    echo "If you want to reset it, run: php wp-cli.phar db reset --yes && php wp-cli.phar db import chitramaya_dump_live.sql"
else
    echo "Database $DB_NAME does not exist. Creating and importing dump..."
    mysql -u root -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"
    php wp-cli.phar db import chitramaya_dump_live.sql
    echo "Database $DB_NAME created and dump imported successfully."
fi

echo "Branch switch complete! Your local site is now using database: $DB_NAME"
