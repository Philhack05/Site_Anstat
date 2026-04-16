# ÉTAPE 1 : Installation des dépendances avec Composer
FROM composer:2.6 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# ÉTAPE 2 : Image de production (Apache + PHP)
FROM php:8.2-apache

# Installation des dépendances système et extensions PHP pour CI4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpng-dev \
    && docker-php-ext-install intl pdo_mysql mysqli gd \
    && a2enmod rewrite

# Configuration du DocumentRoot pour pointer vers le dossier /public de CI4
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copie du code source et des dépendances
WORKDIR /var/www/html
COPY --from=vendor /app/vendor ./vendor
COPY . .

# Droits d'accès pour les dossiers de cache et de logs (indispensable pour CI4)
RUN chown -R www-data:www-data writable \
    && chmod -R 775 writable

EXPOSE 80