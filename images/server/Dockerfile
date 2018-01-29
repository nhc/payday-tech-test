FROM php:7.0-apache

COPY app/ /var/www/html/
COPY ./php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl

# Install extensions using the helper script provided by the base image
RUN docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql

WORKDIR /var/www/html

EXPOSE 8081