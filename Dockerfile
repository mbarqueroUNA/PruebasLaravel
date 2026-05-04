FROM php:8.2-apache

# Instalar paquetes del sistema (IMPORTANTE incluir libsqlite3-dev)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Configuración de Apache para Laravel
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Copiar el proyecto
COPY . /var/www/html

WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Crear archivo SQLite si no existe
RUN touch database/database.sqlite

# Permisos correctos para Laravel
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache \
    database

# Ejecutar migraciones en producción
RUN php artisan migrate --force

EXPOSE 80
