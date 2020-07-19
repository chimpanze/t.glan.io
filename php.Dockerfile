FROM php:7.4-fpm

RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq \
      apt-utils \
      libzip-dev zip unzip && \
      docker-php-ext-configure zip; \
      # Install the zip extension
      docker-php-ext-install zip && \
      docker-php-ext-install exif \
      docker-php-ext-install opcache \
      docker-php-ext-install mysqli \
      apt-get -y install default-mysql-client
