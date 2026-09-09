# KOPEKU — PHP 8.3 (Debian trixie) + extensions + MySQL client
FROM mcr.microsoft.com/devcontainers/php:8.3

COPY --from=ghcr.io/mlocati/php-extension-installer:latest /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions mbstring gd zip pdo_mysql intl bcmath curl \
    && apt-get update \
    && apt-get install -y --no-install-recommends mariadb-client \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*