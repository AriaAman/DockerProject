#DockerFile PostgreSQL
# Utilisez l'image officielle PostgreSQL Alpine
FROM alpine

#  pour etre sur de mettre a jour la machine
RUN apk update && apk upgrade

RUN apk add --no-cache \
    php \
    php-dom \
    php-iconv \
    php-ctype \
    php-session \
    php-simplexml \
    php-tokenizer \
    php-pdo \
    php-pdo_pgsql \
    bash \
    curl
#setup symfony pour alpine
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add symfony-cli

WORKDIR /mon_projet/

EXPOSE 8000

ENTRYPOINT symfony server:start