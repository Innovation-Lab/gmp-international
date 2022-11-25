FROM php:8.1-fpm-alpine

#app source
WORKDIR /var/www/html
COPY . /var/www/html


# install dependent packages...
RUN apk update \
  && apk add autoconf build-base \
  && apk add --no-cache libzip-dev icu-libs zlib-dev \
  && apk add --no-cache zip unzip \
  && apk add --no-cache --virtual build-dependencies icu-dev \
  && apk add --no-cache freetype-dev libjpeg-turbo-dev libmcrypt-dev libpng-dev \
  && pecl install xdebug \
  apt-get install -y \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install zip intl pdo_mysql \
  && docker-php-ext-enable xdebug \
  && apk add --no-cache imagemagick \
  && apk add --no-cache --virtual .phpize-deps imagemagick-dev build-base autoconf libpng-dev libjpeg-turbo-dev libxml2-dev \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && apk del .phpize-deps

# provide root permission to composer
ENV COMPOSER_ALLOW_SUPERUSER 1 \
    COMPOSER_NO_INTERACTION 1

# install composer...
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN set -xeu \
