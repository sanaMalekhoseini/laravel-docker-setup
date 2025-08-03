FROM php:8.3-fpm

# Install composer
RUN echo "\e[1;33mInstall COMPOSER\e[0m"
RUN cd /tmp \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql


# Install important libraries
RUN echo "\e[1;33mInstall important libraries\e[0m"
RUN apt-get update && apt-get install -y \
    nano wget vim unzip zip git curl \
    libzip-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libssl-dev \
    libmcrypt-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql zip intl bcmath opcache

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql
RUN chown -R 777 .

