# Utilisez l'image officielle PostgreSQL Alpine
FROM alpine

# pour être sûr de mettre à jour la machine
RUN apk update && apk upgrade

# Installation de PostgreSQL et de ses outils
RUN apk add postgresql postgresql-client

# Création du répertoire de la base de données et attribution des permissions appropriées
RUN mkdir -p /run/postgresql /var/lib/postgresql/data && \
    chown -R postgres:postgres /run/postgresql /var/lib/postgresql/data

# Copiez votre script SQL dans un répertoire temporaire
COPY fakeData.sql /tmp/fakeData.sql

# Exposez le port standard de PostgreSQL
EXPOSE 5432

# Basculer en utilisateur postgres pour les commandes suivantes
USER postgres

# Initialisation de la base de données
RUN initdb -D /var/lib/postgresql/data

# Modification du fichier de configuration pour autoriser les connexions externes
RUN echo "host all all 0.0.0.0/0 md5" >> /var/lib/postgresql/data/pg_hba.conf && \
    echo "listen_addresses='*'" >> /var/lib/postgresql/data/postgresql.conf

# Démarrer le serveur PostgreSQL en arrière-plan, définir le mot de passe et exécuter le script SQL
RUN pg_ctl -D /var/lib/postgresql/data -o "-c listen_addresses='*'" -w start && \
    psql --command "ALTER USER postgres WITH PASSWORD 'test';" && \
    psql -U postgres -f /tmp/fakeData.sql && \
    pg_ctl -D /var/lib/postgresql/data -w stop

# Commande pour démarrer le serveur PostgreSQL lors du démarrage du conteneur
CMD ["postgres", "-D", "/var/lib/postgresql/data"]
