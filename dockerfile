FROM php:7.1-apache

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
	zip \
	unzip
    && docker-php-ext-install -j$(nproc) iconv mysqli pdo pdo_mysql mbstring \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

ADD backend.zip /var/www/html
ADD frontend.zip /var/www/html
ADD backend.conf /etc/apache2/sites-available/backend.conf
ADD frontend.conf /etc/apache2/sites-available/frontend.conf

RUN a2dissite 000-default && a2ensite frontend.conf && a2ensite backend.conf && cd /var/www/html/ && unzip frontend.zip . && unzip backend.zip . && /etc/init.d/apache2 restart 
