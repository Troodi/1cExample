FROM phpswoole/swoole:4.8.6-php8.1

ENV DEBIAN_FRONTEND noninteractive

#RUN
RUN apt-get -y install supervisor

RUN apt-get update && apt-get -y --no-install-recommends install \
        git \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libpcre3-dev \
        libssl-dev \
        zip \
        libzip-dev \
        unzip \
        procps \
        cron \
        nano \
        nodejs

RUN pecl update-channels \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pcntl pdo pdo_mysql zip gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy existing application directory contents
COPY . /var/www
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY crontab /etc/cron.d/crontab
COPY start-container /usr/local/bin/start-container

RUN chmod 0644 /etc/cron.d/crontab && touch /var/log/cron.log
RUN chmod +x /usr/local/bin/start-container
# Set working directory

ENTRYPOINT ["start-container"]
