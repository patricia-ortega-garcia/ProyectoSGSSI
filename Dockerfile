FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
RUN a2enmod headers
COPY apache2.conf /etc/apache2/
RUN service apache2 restart


