FROM php:7.1-fpm-alpine

WORKDIR /hub/

# install necessary packages
RUN set -xe && \
	apk add --update --no-cache $PHPIZE_DEPS && \
	\
	docker-php-ext-install pdo_mysql && \
	\
	pecl install xdebug-2.5.5 && \
	mkdir /xdebug/ && \
    \
    mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini && \
    #echo "extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/pdo_mysql.so" \
    #	>> /usr/local/etc/php/php.ini && \
    chown -R www-data:www-data /hub/