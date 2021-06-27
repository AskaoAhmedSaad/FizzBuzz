FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
RUN rm -rf /tmp/*

CMD ["php-fpm", "-F"]

WORKDIR /var/www/app

EXPOSE 9000

