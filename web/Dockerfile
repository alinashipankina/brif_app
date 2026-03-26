FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (для кэширования)
COPY composer.json composer.lock* ./

# Install PHP dependencies (без скриптов)
RUN composer install --no-interaction --no-scripts --optimize-autoloader

# Copy the rest of the application
COPY . .

# Run composer scripts after copying artisan
RUN composer run-script post-autoload-dump

# Install NPM dependencies and build
RUN npm install && npm run build

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Create user
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN groupadd -g ${GROUP_ID} laravel && \
    useradd -u ${USER_ID} -g laravel -m laravel && \
    chown -R laravel:laravel /var/www/html

USER laravel

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
