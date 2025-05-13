FROM php:8.3-cli

# 必要なPHP拡張
RUN apt-get update && apt-get install -y unzip git libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Laravel インストール用
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
