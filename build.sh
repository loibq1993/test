#!/bin/bash
#Auto run after deploy source code
cd /var/www/html/ && \
composer install && \
composer dumpautoload && \
php artisan migrate --force && \
php artisan cache:clear && \
php artisan config:clear && \
php artisan route:clear && \
php artisan queue:restart && \
php artisan storage:link && \
supervisorctl reload && \
cp -f scripts/laravel_crontab /etc/cron.d/

