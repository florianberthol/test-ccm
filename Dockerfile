FROM php:8.0-cli
WORKDIR /app

RUN apt-get update && apt-get install -y wget libicu-dev
RUN docker-php-ext-install intl
RUN wget https://get.symfony.com/cli/installer -q && chmod +x installer
RUN ./installer --install-dir=/usr/local/bin && rm ./installer

VOLUME /app

CMD symfony server:start --no-tls