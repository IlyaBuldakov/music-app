FROM php:8.2.0-fpm

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/music-app

CMD ["php-fpm"]

ENTRYPOINT ["./docker/migrations.sh"]
