FROM php:7.4-fpm

RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
      docker-php-ext-install opcache && \
      docker-php-ext-install mysqli && \
      docker-php-ext-install pdo_mysql && \
      apt-get -y install default-mysql-client
