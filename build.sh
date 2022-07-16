#!/bin/bash
#Auto run after deploy source code
cd /var/www/html/ && \
composer install && \
composer dumpautoload && \
sudo chown -R nginx:ec2-user /var/www/html/ && \
sudo find /var/www/html/ -type f -exec chmod 664 {} \; && \
sudo find /var/www/html/ -type d -exec chmod 775 {} \; && \
php artisan migrate --force && \
php artisan cache:clear && \
php artisan config:clear && \
php artisan route:clear && \
php artisan queue:restart && \
php artisan storage:link && \
sudo service supervisord restart  && \
sudo cp -f scripts/laravel_crontab /etc/cron.d/
