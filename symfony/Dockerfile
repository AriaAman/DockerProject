#DockerFile PostgreSQL
# Utilisez l'image officielle PostgreSQL Alpine
FROM alpine

#  pour etre sur de mettre a jour la machine
RUN apk update && apk upgrade

RUN apk add php
RUN apk add php-dom
RUN apk add php-iconv
RUN apk add php-ctype
RUN apk add php-session
RUN apk add php-simplexml
RUN apk add php-tokenizer
RUN apk add php-pdo
RUN apk add php-pdo_pgsql
RUN apk add --no-cache bash
RUN apk add --no-cache curl
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add symfony-cli

WORKDIR /mon_projet/

EXPOSE 8000

ENTRYPOINT symfony server:start