# Utilisez votre image PHP Alpine comme base
FROM alpine

#  pour etre sur de mettre a jour la machine
RUN apk update && apk upgrade

RUN apk add php
RUN apk add php-fpm
RUN apk add curl
RUN apk add php-phar
RUN apk add php-mbstring
RUN apk add php-openssl
RUN apk add php-ctype
RUN apk add php-json
RUN apk add php-iconv
RUN apk add php-session
RUN apk add php-pdo
RUN apk add php-tokenizer
RUN apk add php-simplexml
RUN apk --no-cache add php-xml
RUN apk --no-cache add libxml2-dev
RUN apk add php-dom
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN composer create-project symfony/skeleton: /mon_projet
WORKDIR /mon_projet

RUN composer install
RUN composer require symfony/orm-pack
RUN composer require twig
RUN composer require symfony/maker-bundle


WORKDIR /volume/mon_projet
CMD ["cp", "-R", "/mon_projet/", "/volume","php-fpm"]
