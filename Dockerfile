# Use PHP 8.2 base image with extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    unzip \
    zip \
    libonig-dev \
    libxml2-dev \
    libssl-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip bcmath mbstring xml exif

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./docker/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

    # Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
# Copy the auth.json for Composer authentication
#COPY ./auth.json /root/.composer/auth.json

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --ignore-platform-reqs

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache


# Expose port 9000
EXPOSE 9000

CMD ["php-fpm"]
