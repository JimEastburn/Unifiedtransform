#!/bin/bash
# Exit on error
set -e

echo "Starting deployment optimizations..."

# Clear any existing caches that might have been copied
php artisan config:clear
php artisan cache:clear

echo "Verifying environment..."
echo "DB_CONNECTION: ${DB_CONNECTION:-not set}"
echo "DB_HOST length: ${#DB_HOST}"
echo "DB_PORT length: ${#DB_PORT}"
echo "DB_DATABASE length: ${#DB_DATABASE}"
echo "DB_USERNAME length: ${#DB_USERNAME}"
echo "DB_PASSWORD length: ${#DB_PASSWORD}"
echo "DATABASE_URL length: ${#DATABASE_URL}"

# Run migrations
# Note: --force is required in production
echo "Running migrations..."
php artisan migrate --force

echo "Running database seeders..."
php artisan db:seed --force

# Cache configuration, routes and views
echo "Caching for performance..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Optimizations complete. Starting Apache..."

# Start Apache in foreground
apache2-foreground
