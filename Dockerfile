From php:8.2.10-fpm

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo_mysql

RUN mkdir -p /var/www/public/assets
RUN chmod -R 775 /var/www/public/assets
RUN chown -R 1000:www-data /var/www/public/assets
