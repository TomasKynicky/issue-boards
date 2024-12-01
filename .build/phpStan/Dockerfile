
ARG CI_APPLICATION_REPOSITORY
ARG CI_APPLICATION_TAG

FROM ${CI_APPLICATION_REPOSITORY}:${CI_APPLICATION_TAG}-vendor-dev as vendor-dev
FROM ${CI_APPLICATION_REPOSITORY}:${CI_APPLICATION_TAG}-generator as generator

FROM php:8.3.3-fpm-alpine3.18
WORKDIR /code/

COPY --from=ghcr.io/phpstan/phpstan:latest-php8.3 /composer/vendor/phpstan/phpstan/phpstan.phar /app/phpstan.phar

COPY --from=vendor-dev /code/vendor /code/vendor
COPY --from=generator /code/src-generated /code/src-generated