FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli

COPY app/config/apache2.conf /etc/apache2/apache2.conf
COPY app/config/php.ini /usr/local/etc/php/php.ini

RUN a2enmod headers
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
