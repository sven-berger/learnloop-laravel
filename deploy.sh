#!/usr/bin/env bash
set -e

cd /var/www/laravel.riftcore.de

export HOME=/var/www/laravel.riftcore.de
export GIT_SSH_COMMAND="ssh -i /var/www/laravel.riftcore.de/.ssh/github_deploy -o IdentitiesOnly=yes -o UserKnownHostsFile=/var/www/laravel.riftcore.de/.ssh/known_hosts"

# Prevent concurrent deploys (webhook retries / multiple pushes)
LOCK_FILE="/tmp/learnloop-deploy.lock"
exec 9>"$LOCK_FILE"
if ! flock -n 9; then
    echo "[$(date)] ========= DEPLOY SKIPPED (lock busy) =========" >> storage/logs/deploy.log
    exit 0
fi

echo "[$(date)] ========= DEPLOYING =========" >> storage/logs/deploy.log

# Git
git fetch origin
git reset --hard origin/main
COMMIT=$(git rev-parse --short HEAD)
echo "[$(date)] Pulled commit: $COMMIT" >> storage/logs/deploy.log

# PHP dependencies
if [ -f composer.json ]; then
    composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
fi

# npm dependencies - always install to ensure packages are up-to-date
echo "[$(date)] Installing npm packages..." >> storage/logs/deploy.log
/usr/bin/npm ci --include=dev >> storage/logs/deploy.log 2>&1

# Ensure production asset mode (never use stale Vite dev server marker)
echo "[$(date)] Cleaning old frontend artifacts..." >> storage/logs/deploy.log
rm -f public/hot
rm -rf public/build

# Always build - this is critical for CSS/JS updates
echo "[$(date)] Building assets..." >> storage/logs/deploy.log
/usr/bin/npm run build >> storage/logs/deploy.log 2>&1
echo "[$(date)] Assets built successfully" >> storage/logs/deploy.log

# Clear caches
php artisan config:clear
php artisan cache:clear

echo "[$(date)] ========= DEPLOYMENT OK =========" >> storage/logs/deploy.log
