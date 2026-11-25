FROM richarvey/nginx-php-fpm:latest
COPY . /var/www/html
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1
WORKDIR /var/www/html
RUN chmod +x /var/www/html/start.sh && touch /var/www/html/database/database.sqlite && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
CMD ["/bin/bash", "/var/www/html/start.sh"]