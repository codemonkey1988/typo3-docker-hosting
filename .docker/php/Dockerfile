FROM php:7.3-fpm-alpine3.9

# See https://github.com/docker-library/php/issues/57#issuecomment-318056930 for php ext intl install and requirements.
RUN set -xe \
    && apk add --update --no-cache \
        libpng-dev \
        freetype-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        libwebp-tools \
        graphicsmagick \
        libzip-dev \
        icu \
        gettext-dev \
        ghostscript-dev \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        zlib-dev \
        icu-dev \
        g++ \
    && pecl install redis \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr --with-png-dir=/usr --with-freetype-dir=/usr --with-webp-dir=/usr \
    && docker-php-ext-install pdo_mysql mysqli gd zip gettext opcache \
    && docker-php-ext-enable redis \
    && { find /usr/local/lib -type f -print0 | xargs -0r strip --strip-all -p 2>/dev/null || true; } \
    && apk del .build-deps \
    && rm -rf /tmp/* /usr/local/lib/php/doc/* /var/cache/apk/*

RUN mkdir -p /log/php /app/var /app/public/typo3temp \
    && chown -R www-data:www-data /app

COPY .docker/php/entrypoint.sh /
RUN chmod 700 /entrypoint.sh

RUN touch /app/env.sh \
    && chown www-data /app/env.sh \
    && chmod 700 /app/env.sh

COPY .docker/php/cron/typo3.txt /etc/crontabs/www-data

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY .docker/php/conf/override.ini $PHP_INI_DIR/conf.d/
COPY .docker/php/conf/opcache.ini $PHP_INI_DIR/conf.d/

COPY --chown=www-data:www-data config/sites /app/config/sites
COPY --chown=www-data:www-data config/system/production /app/config/system/production
COPY --chown=www-data:www-data vendor /app/vendor
COPY --chown=www-data:www-data public/typo3 /app/public/typo3
COPY --chown=www-data:www-data public/index.php /app/public/index.php
COPY --chown=www-data:www-data public/typo3conf /app/public/typo3conf

WORKDIR /app

ENTRYPOINT /entrypoint.sh