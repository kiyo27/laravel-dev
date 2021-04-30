FROM php:7.3-fpm
COPY php.ini /usr/local/etc/php/

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update &&\
    apt-get install -y libzip-dev &&\
    docker-php-ext-configure zip --with-libzip && \
    # Install the zip extension
    docker-php-ext-install zip && \
    docker-php-ext-install pdo_mysql

WORKDIR /var/www

RUN composer global require "laravel/installer"