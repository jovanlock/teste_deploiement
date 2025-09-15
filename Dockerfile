# Utiliser l'image PHP officielle avec Apache
FROM php:8.2-apache

# Copier tous les fichiers du projet dans le container
COPY . /var/www/html/

# Exposer le port 80
EXPOSE 80
RUN docker-php-ext-install mysqli