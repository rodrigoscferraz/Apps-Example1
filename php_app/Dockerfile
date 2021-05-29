FROM php:7.2.5-alpine

RUN apk update
RUN apk add ca-certificates openssl
RUN update-ca-certificates

RUN wget -O /usr/local/bin/composer https://getcomposer.org/download/2.0.14/composer.phar
RUN chmod +x /usr/local/bin/composer

ADD composer.* /app/
RUN cd /app && composer install

ADD . /app
WORKDIR /app