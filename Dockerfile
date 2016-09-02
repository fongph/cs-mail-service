FROM php:7.0-cli
# in 5.6 problem with ssl connection

RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    curl \
    libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) intl curl bcmath \
    && rm -r /var/lib/apt/lists/*

ADD docker/php.ini /usr/local/etc/php

COPY . /code
COPY ./config.production.php /code/config.php

WORKDIR /code

ENTRYPOINT ["php", "index.php"]