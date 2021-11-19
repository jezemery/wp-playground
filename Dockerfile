ARG PHP_VERSION=7.4
ARG NGINX_VERSION=1.19.10
ARG MYSQL_VERSION=5.7

FROM php:${PHP_VERSION}-fpm-alpine as app_php

ARG WORKDIR=/app

RUN docker-php-source extract \
    && apk add --update --virtual .build-deps autoconf g++ jpeg-dev zlib-dev make pcre-dev icu-dev openssl-dev libzip-dev libxml2-dev libmcrypt-dev git imap-dev krb5-dev libpng-dev \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo_mysql \
    && pecl install apcu xdebug \
    && docker-php-ext-enable apcu opcache \
    && apk add icu-libs icu \
    && docker-php-ext-install -j5 intl imap mysqli soap gd zip\
    && docker-php-ext-enable imap \
    # Post run
	&& runDeps="$( \
		scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
			| tr ',' '\n' \
			| sort -u \
			| awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
	)" \
	&& apk add --no-cache --virtual .app-phpexts-rundeps $runDeps \
	&& pecl clear-cache \
    && docker-php-source delete \
    && apk del --purge .build-deps \
    && rm -rf /tmp/pear \
    && rm -rf /var/cache/apk/*

COPY docker/php/php.ini $PHP_INI_DIR/conf.d/php.ini
COPY docker/php/php-cli.ini $PHP_INI_DIR/conf.d/php-cli.ini
COPY docker/php/xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini

RUN mkdir -p ${WORKDIR}
WORKDIR ${WORKDIR}

VOLUME ${WORKDIR}/var

COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]

FROM nginx:${NGINX_VERSION}-alpine AS app_nginx

COPY docker/nginx/conf.d/default.conf /etc/nginx/conf.d/

WORKDIR /app

FROM mysql:${MYSQL_VERSION} AS app_mysql

WORKDIR /app
