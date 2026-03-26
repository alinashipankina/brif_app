#!/bin/sh
set -e

# Проверяем, нужно ли копировать файлы в volume
if [ ! -f "/var/www/html/artisan" ]; then
    echo "Initializing volume with application files..."
    cp -rp /tmp/app/* /var/www/html/
fi

echo "Waiting for database..."
until php artisan db:show 2>/dev/null; do
    echo "Database is unavailable - sleeping"
    sleep 2
done

echo "Database is up - executing migrations"
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Publishing Livewire assets..."
php artisan vendor:publish --tag=livewire:assets --force 2>/dev/null || true

echo "Clearing and caching config..."
php artisan config:cache
php artisan route:cache

echo "Starting PHP-FPM..."
exec php-fpm
