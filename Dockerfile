# Choisir l'image de base avec Apache et PHP
FROM php:8.2-apache

# Installer les dépendances nécessaires pour PDO MySQL
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Activer le module rewrite pour Apache
RUN a2enmod rewrite

# Définir le ServerName pour éviter l'avertissement
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copier le code du projet dans le conteneur
COPY . /var/www/html/

# Copier le fichier .htaccess dans la racine du projet
COPY .htaccess /var/www/html/.htaccess

# Assurer que les permissions sont correctement définies pour tous les fichiers
RUN chmod -R 777 /var/www/html \
    && chmod -R 777 /var/www/html/storage \
    && chmod -R 777 /var/www/html/bootstrap/cache

# Modifier les permissions de l'utilisateur apache (www-data) sur les fichiers du projet
RUN chown -R www-data:www-data /var/www/html

# S'assurer que Apache peut lire le fichier .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Exposer le port 80
EXPOSE 80


# Démarrer Apache au premier plan
CMD ["apache2ctl", "-D", "FOREGROUND"]
