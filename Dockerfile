# ÉTAPE 1 : Installation des dépendances avec Composer
FROM composer:2.6 AS vendor

# Sur Alpine, on utilise 'apk' pour installer les dépendances système
# icu-dev est nécessaire pour l'extension PHP intl
RUN apk add --no-cache \
    icu-dev \
    libpng-dev \
    zlib-dev

# L'image Composer inclut déjà les outils pour ajouter des extensions
RUN docker-php-ext-install intl

WORKDIR /app
COPY composer.json composer.lock ./

# On installe les dépendances en ignorant les vérifications de plateforme 
# si PHP 8.3 pose toujours problème à laminas-escaper
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# ÉTAPE 2 : Image de production (Stable et testée)
FROM php:8.2-apache-bookworm

# Nettoyage des caches et installation forcée
RUN apt-get update && apt-get install -y --no-install-recommends \
    libicu-dev \
    libpng-dev \
    zlib1g-dev \
    # On limite à 2 jobs simultanés pour ne pas saturer les 8Go
    && MAKEFLAGS="-j2" docker-php-ext-install intl pdo_mysql mysqli gd \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

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