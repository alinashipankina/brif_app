FROM php:8.4-fpm-alpine

# 1. системные зависимости + NodeJS + дополнительные пакеты для Composer
RUN apk add --no-cache \
    bash \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libxml2-dev \
    icu-dev \
    oniguruma-dev \
    autoconf \
    make \
    g++ \
    nodejs-current \
    npm \
    # Дополнительные пакеты, которые могут понадобиться
    libzip-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxpm-dev \
    libwebp-dev \
    # Для работы git и ssh
    openssh-client

# 2. PHP расширения (добавляем zip расширение)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    intl \
    zip \
    opcache

# 3. рабочая директория
WORKDIR /var/www/html

# 4. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Копируем composer файлы
COPY composer.json composer.lock ./

# 6. Устанавливаем зависимости с увеличенным лимитом памяти и без интерактивного режима
RUN php -d memory_limit=-1 /usr/bin/composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress \
    --no-scripts \
    --prefer-dist

# 7. Запускаем скрипты после установки (но только после копирования всего проекта)
# Сначала копируем остальной проект
COPY . .

# 8. Создаем .env файл для production
RUN cp .env.example .env

# 9. Теперь запускаем post-autoload-dump скрипты
RUN composer dump-autoload --optimize --no-dev

# 10. prod сборка фронта
RUN npm install --legacy-peer-deps && \
    npm run build && \
    rm -rf node_modules

# 11. Генерируем APP_KEY
RUN php artisan key:generate

# 12. права на storage и cache
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# 13. Копируем приложение во временную директорию для последующего копирования в volume
RUN cp -rp /var/www/html /tmp/app

# 14. Копируем и настраиваем entrypoint скрипт
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# 15. Настройка opcache для продакшена
RUN docker-php-ext-enable opcache

# 16. expose php-fpm порт
EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]
