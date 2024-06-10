FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    pkg-config \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql mbstring zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY src /var/www

RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

USER www-data
RUN composer install

USER root

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]
