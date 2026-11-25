#!/usr/bin/env bash
set -e
cd /var/www/html
[ -f database/database.sqlite ] || touch database/database.sqlite
chown -R www-data:www-data storage bootstrap/cache database
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html
echo "Caching config..."
php artisan config:cache
echo "Caching routes..."
php artisan route:cache
echo "Running migrations..."
php artisan migrate --force
echo "Starting up..."
exec /start.sh