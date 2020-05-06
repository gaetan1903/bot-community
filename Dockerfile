FROM php:7.4-apache

COPY . /var/www/html/

WORKDIR /var/www/html

CMD sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && docker-php-entrypoint apache2-foreground
