
FROM php:8.3.3-fpm-alpine3.18
WORKDIR /code/

COPY --from=ghcr.io/phpstan/phpstan:latest-php8.3 /composer/vendor/phpstan/phpstan/phpstan.phar /app/phpstan.phar