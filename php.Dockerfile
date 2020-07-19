FROM php:7.4-fpm

RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
      docker-php-ext-install opcache && \
      docker-php-ext-install mysqli && \
      apt-get -y install default-mysql-client
