# DockerFile Adminer
# Utilisez une image PHP Alpine comme base
FROM alpine

#  pour etre sur de mettre a jour la machine
RUN apk update && apk upgrade

# Installez php
RUN apk add php php-session php-pgsql

# Installez Adminer
WORKDIR /
# on mets index.php car c'est ce que le serv web va chercher, on copie adminer.php dans index.php et en meme temps ca le renomme
COPY ./adminer.php /index.php
COPY ./default.css /adminer.css

# Exposez le port web
EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "/"]