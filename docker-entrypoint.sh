#!/bin/sh

set -e

php artisan migrate --force
php artisan storage:link || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

php-fpm -D

nginx -g "daemon off;"