#!/bin/bash

# Exit on error
set -e

echo "Starting deployment optimizations..."

# Run migrations
# Note: --force is required in production
php artisan migrate --force

# Cache configuration, routes and views
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Optimizations complete. Starting Apache..."

# Start Apache in foreground
apache2-foreground
