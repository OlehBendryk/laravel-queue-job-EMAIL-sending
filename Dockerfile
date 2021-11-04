FROM php:7.4-fpm-buster

RUN apt-get update && apt-get install -y wget \
    && docker-php-ext-install pdo pdo_mysql \
    && wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip
