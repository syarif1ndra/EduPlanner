# Menggunakan base image PHP dengan versi yang mendukung Laravel (misalnya 8.0 atau 8.1)
FROM php:8.1-fpm

# Mengatur variabel agar tidak ada prompt saat install dependencies
ARG DEBIAN_FRONTEND=noninteractive

# Install dependencies yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set up working directory
WORKDIR /var/www

# Copy file aplikasi ke dalam container
COPY . .

# Install dependencies aplikasi Laravel
RUN composer install --no-scripts --no-autoloader

# Generate autoload files and optimize the app
RUN composer dump-autoload --optimize

# Set permission untuk folder Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Copy file .env.example sebagai .env dan jalankan key:generate
RUN cp .env.example .env \
    && php artisan key:generate

# Expose port untuk Nginx
EXPOSE 8000

# Perintah untuk menjalankan aplikasi
CMD php artisan serve --host=0.0.0.0 --port=8000
