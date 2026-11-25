FROM php:8.4-fpm-alpine

RUN apk add --no-cache nginx supervisor sqlite-dev libpng-dev libxml2-dev zip unzip git curl
RUN docker-php-ext-install pdo pdo_sqlite pdo_mysql bcmath ctype fileinfo json mbstring openssl tokenizer xml
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN touch database/database.sqlite && chown -R www-data:www-data storage bootstrap/cache database public

RUN mkdir -p /run/nginx && \
    printf '%s\n' \
    'server {' \
    '    listen 10000;' \
    '    root /var/www/html/public;' \
    '    index index.php;' \
    '    location / { try_files $uri $uri/ /index.php?$query_string; }' \
    '    location ~ \.php$ {' \
    '        fastcgi_pass 127.0.0.1:9000;' \
    '        include fastcgi_params;' \
    '        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;' \
    '    }' \
    '}' > /etc/nginx/http.d/default.conf

RUN printf '%s\n' \
    '[supervisord]' \
    'nodaemon=true' \
    '[program:php-fpm]' \
    'command=php-fpm -F' \
    '[program:nginx]' \
    'command=nginx -g "daemon off;"' > /etc/supervisord.conf

RUN printf '%s\n' \
    '#!/bin/sh' \
    'set -e' \
    'cd /var/www/html' \
    'php artisan migrate --force' \
    'php artisan config:cache' \
    'php artisan route:cache' \
    'php artisan view:cache' \
    'exec /usr/bin/supervisord -c /etc/supervisord.conf' > /entrypoint.sh && chmod +x /entrypoint.sh

EXPOSE 10000
CMD ["/entrypoint.sh"]