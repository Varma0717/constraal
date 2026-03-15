#!/bin/bash

echo "=== Constraal Azure Deployment ==="

# Navigate to the deployment directory
cd /home/site/wwwroot

# Install Composer dependencies (no dev)
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Laravel optimizations
echo "Running Laravel optimizations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
echo "Running migrations..."
php artisan migrate --force

# Create storage symlink
echo "Creating storage link..."
php artisan storage:link 2>/dev/null || true

# Set permissions
echo "Setting permissions..."
chmod -R 775 storage bootstrap/cache

echo "=== Deployment complete ==="
