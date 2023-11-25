FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli

COPY localhost.conf /etc/apache2/sites-available/
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/localhost.key -out /etc/ssl/certs/localhost.crt -subj "/C=ES/ST=EUSKALHERRIA/L=BILBAO/O=EHU"
RUN a2enmod headers
RUN a2ensite localhost.conf
RUN a2enmod ssl
COPY apache2.conf /etc/apache2/
RUN service apache2 restart



