FROM php:8.4-fpm-alpine

# Dependencies & extensions
RUN apk add --no-cache \
    nginx \
    bash \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite \
    sqlite-dev \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_sqlite mbstring bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html

COPY nginx.conf /etc/nginx/http.d/default.conf

# Dependencies install
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Storage aur database ensure karein
RUN mkdir -p /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/logs \
    /var/www/html/database

RUN touch /var/www/html/database/database.sqlite

# Full writable permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 80

CMD ["sh", "-c", "php artisan storage:link || true && php artisan config:clear && php artisan migrate --force --seed && php-fpm -D && nginx -g 'daemon off;'"]