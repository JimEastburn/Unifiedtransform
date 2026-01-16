#!/bin/bash
# Exit on error
set -e

echo "Starting deployment optimizations..."

# Clear any existing caches that might have been copied
php artisan config:clear
php artisan cache:clear

echo "Verifying environment..."
echo "DB_CONNECTION: ${DB_CONNECTION:-not set}"
echo "DATABASE_URL is set (length): ${#DATABASE_URL}"

# Run migrations
# Note: --force is required in production
echo "Running migrations..."
php artisan migrate --force

# Cache configuration, routes and views
echo "Caching for performance..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Optimizations complete. Starting Apache..."

# Start Apache in foreground
apache2-foreground
