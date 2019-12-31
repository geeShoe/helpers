ARG PHP_VERSION

FROM php:${PHP_VERSION}-cli-buster

RUN apt-get update && apt-get install -yqq \
    libzip-dev \
    zip \
    git

RUN curl -s https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install zip

RUN set -xe; \
    groupadd -g 1000 developer && \
    useradd -u 1000 -g developer -m developer && \
    usermod -p "*" developer -s /bin/bash

COPY .bash_aliases /home/developer/.bash_aliases

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

USER developer

WORKDIR /var/develop