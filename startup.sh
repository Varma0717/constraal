#!/bin/bash

# Copy custom Nginx configuration
cp /home/site/wwwroot/default /etc/nginx/sites-available/default
service nginx reload

# Ensure storage directories exist
mkdir -p /home/site/wwwroot/storage/framework/{sessions,views,cache}
mkdir -p /home/site/wwwroot/storage/logs
chmod -R 775 /home/site/wwwroot/storage /home/site/wwwroot/bootstrap/cache
