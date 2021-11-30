FROM php:8-apache

COPY crud/ /var/www/html/
WORKDIR /var/www/html/
RUN docker-php-ext-install mysqli

EXPOSE 80