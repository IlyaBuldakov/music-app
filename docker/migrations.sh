#!/bin/sh

cd /var/www/music-app
php artisan migrate:fresh --seed
exec "$@"
