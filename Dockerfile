# Use official PHP image with required extensions
FROM php:8.3-fpm

# Install system dependencies required for Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer (PHP package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory inside the container
WORKDIR /var/www

# Copy the Laravel project files to the working directory
COPY . .

# Install the Laravel dependencies with Composer
RUN composer install --no-interaction --prefer-dist

# Ensure the storage and cache directories are writable by the web server
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose the port the app will run on
EXPOSE 9000

# Run PHP-FPM to serve the app
CMD ["php-fpm"]