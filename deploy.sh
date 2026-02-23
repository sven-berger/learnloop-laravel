#!/usr/bin/env bash
set -euo pipefail

cd /var/www/laravel.riftcore.de

export HOME=/var/www/laravel.riftcore.de
export GIT_SSH_COMMAND="ssh -i /var/www/laravel.riftcore.de/.ssh/github_deploy -o IdentitiesOnly=yes -o UserKnownHostsFile=/var/www/laravel.riftcore.de/.ssh/known_hosts"

LOG_FILE="storage/logs/deploy.log"

log() {
    echo "[$(date)] $1" >> "$LOG_FILE"
}

fail() {
    log "DEPLOY FAILED: $1"
    exit 1
}

trap 'fail "Command failed at line $LINENO"' ERR

# Prevent concurrent deploys (webhook retries / multiple pushes)
LOCK_FILE="/tmp/learnloop-deploy.lock"
exec 9>"$LOCK_FILE"
if ! flock -n 9; then
    log "========= DEPLOY SKIPPED (lock busy) ========="
    exit 0
fi

log "========= DEPLOYING ========="

# Git
git fetch origin
git reset --hard origin/main
COMMIT=$(git rev-parse --short HEAD)
log "Pulled commit: $COMMIT"

# PHP dependencies
if [ -f composer.json ]; then
    composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
fi

# npm dependencies - always install to ensure packages are up-to-date
log "Installing npm packages..."
npm ci --include=dev >> "$LOG_FILE" 2>&1

# Ensure production asset mode (never use stale Vite dev server marker)
log "Cleaning old frontend artifacts..."
rm -f public/hot

# Always build - this is critical for CSS/JS updates
log "Building assets..."
npm run build >> "$LOG_FILE" 2>&1

if [ ! -s public/build/manifest.json ]; then
    fail "Vite manifest missing: public/build/manifest.json"
fi

if id -u www-data >/dev/null 2>&1; then
    chown -R www-data:www-data public/build
fi

log "Assets built successfully (manifest OK)"

# Clear all caches (wichtig nach .env, Routes, Views Änderungen)
log "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Run migrations (nur neue werden ausgeführt)
log "Running migrations..."
php artisan migrate --force >> "$LOG_FILE" 2>&1

# Rebuild caches für Production Performance
log "Rebuilding optimized caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

log "========= DEPLOYMENT OK ========="
