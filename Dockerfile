FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    php8.2-common \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . /app

EXPOSE $PORT

CMD php -S 0.0.0.0:$PORT -t .
