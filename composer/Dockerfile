# Utilisez votre image PHP Alpine comme base
FROM alpine

#  pour etre sur de mettre a jour la machine
RUN apk update && apk upgrade

RUN apk add --no-cache \
    php \
    php-fpm \
    curl \
    php-phar \
    php-mbstring \
    php-openssl \
    php-ctype \
    php-json \
    php-iconv \
    php-session \
    php-pdo \
    php-tokenizer \
    php-simplexml \
    php-xml \
    libxml2-dev \
    php-dom
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN composer create-project symfony/skeleton: /mon_projet
WORKDIR /mon_projet

RUN composer install
RUN composer require symfony/orm-pack
RUN composer require twig
RUN composer require symfony/maker-bundle


WORKDIR /volume/mon_projet

