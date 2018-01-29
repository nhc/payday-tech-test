FROM php:7.1-apache

COPY app/ /var/www/html/
COPY php.ini /usr/local/etc/php/
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl

# Install extensions using the helper script provided by the base image
RUN docker-php-ext-install \
	pdo \
    pdo_mysql

RUN a2enmod rewrite

EXPOSE 8081