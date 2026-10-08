FROM php:8.2-fpm-alpine


RUN apk add --no-cache \
    nginx \
    bash \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite-dev \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_sqlite mbstring bcmath


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html


COPY . /var/www/html


COPY nginx.conf /etc/nginx/http.d/default.conf


RUN composer install --no-dev --optimize-autoloader --no-interaction


RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache


CMD ["sh", "-c", "php artisan storage:link || true && php artisan migrate --force --seed && php-fpm -D && nginx -g 'daemon off;'"]