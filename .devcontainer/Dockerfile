# KOPEKU dev container — PHP 8.3 + MySQL server + PHP extensions
FROM mcr.microsoft.com/devcontainers/php:8.3

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        mysql-server \
        default-mysql-client \
        php8.3-gd \
        php8.3-intl \
        php8.3-mbstring \
        php8.3-mysql \
        php8.3-xml \
        php8.3-zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*