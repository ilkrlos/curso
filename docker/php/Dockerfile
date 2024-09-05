FROM php:fpm-alpine3.20

ARG UID
RUN adduser -u ${UID} --disabled-password --gecos "" appuser
# Create user and some useful stuff
# RUN adduser -u ${UID} --disabled-password --gecos "" appuser
RUN mkdir /home/appuser/.ssh
RUN chown -R appuser:appuser /home/appuser/
RUN echo "StrictHostKeyChecking no" >> /home/appuser/.ssh/config
RUN echo "export COLUMNS=300" >> /home/appuser/.bashrc
RUN echo "alias sf=/appdata/www/bin/console" >> /home/appuser/.bashrc
RUN apk update
# Install packages and PHP extensions
#RUN apk add git acl openssl openssh-client wget zip vim librabbitmq-dev libssh-dev \
#    && apk add  libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
#    && docker-php-ext-install intl pdo pdo_mysql zip soap bcmath sockets \
#    && pecl install xdebug \
#    && docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug
RUN apk add --update linux-headers
RUN apk add git acl openssl openssh-client wget zip vim \
    && apk add libzip-dev \ 
    && apk --update --no-cache add autoconf g++ make && \
    pecl install -f xdebug && \
    docker-php-ext-enable xdebug && \
    apk del --purge autoconf g++ make &&\
    apk del --purge autoconf linux-headers    && docker-php-ext-install intl pdo pdo_mysql zip soap bcmath sockets \ 
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug

RUN docker-php-ext-install opcache
RUN docker-php-ext-enable opcache
RUN apk cache clean && rm -rf /var/lib/apk/*
# Install and update composer
RUN curl https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update
# Install symfony cli
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | sh
RUN apk add symfony-cli
# Install PHP-CS-FIXER
RUN wget https://cs.symfony.com/download/php-cs-fixer-v2.phar -O php-cs-fixer
RUN chmod a+x php-cs-fixer
RUN mv php-cs-fixer /usr/local/bin/php-cs-fixer

RUN mkdir -p /appdata/www

# Config XDEBUG
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /appdata/www
