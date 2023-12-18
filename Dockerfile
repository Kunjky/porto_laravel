FROM php:8.2.7-fpm-bookworm
LABEL maintainer="Hai Nguyen"

# Argument
ARG APP_USER=www-data
ARG APP_ROOT=/var/www/app
ARG TZ=Japan
ARG NGINX_VERSION=1.24.0-1~bookworm
ARG ENVIRONMENT=local

# ENV
ENV NGINX_VERSION=${NGINX_VERSION}
ENV APP_USER=${APP_USER}
ENV APP_ROOT=${APP_ROOT}
ENV TZ=${TZ}
ENV ENVIRONMENT=${ENVIRONMENT}

## Build config
WORKDIR ${APP_ROOT}

# Set timezones
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install required packages
RUN apt-get update && \
    apt-get -y install --no-install-recommends \
    software-properties-common \
    gpg-agent \
    git \
    vim \
    wget \
    jq \
    logrotate \
    apt-utils \
    zip \
    curl \
    gnupg2 \
    ca-certificates \
    lsb-release \
    debian-archive-keyring \
    gnupg \
    gosu \
    supervisor \
    libcap2-bin \
    libpng-dev \
    dnsutils \
    default-mysql-client \
    openssl \
    fontconfig-config \
    fonts-dejavu-core \
    fonts-ipafont-gothic \
    fonts-ipafont-mincho \
    openssh-server \
    supervisor \
    curl \
    gnupg2 \
    ca-certificates \
    lsb-release \
    debian-archive-keyring

# Install nginx
RUN curl https://nginx.org/keys/nginx_signing.key | gpg --dearmor > /usr/share/keyrings/nginx-archive-keyring.gpg && \
    echo "deb [signed-by=/usr/share/keyrings/nginx-archive-keyring.gpg] http://nginx.org/packages/debian $(lsb_release -cs) nginx" | tee /etc/apt/sources.list.d/nginx.list && \
    echo "Package: *\nPin: origin nginx.org\nPin-Priority: 900\n" > /etc/apt/preferences.d/99nginx && \
    apt-get update && \
    apt-get install -y nginx=${NGINX_VERSION}

# Install dependence packages PHP
RUN wget https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions \
    && chmod +x install-php-extensions \
    && ./install-php-extensions bcmath calendar exif ffi gd gettext ldap \
    mysqli pcntl pcov pdo_mysql redis shmop soap sockets sysvmsg \
    sysvsem sysvshm xmlrpc xsl zip igbinary imagick \
    imap intl opcache xdebug swoole memcache memcached msgpack

# Download and install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy configuration files
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Create a new directory for the Laravel app
RUN mkdir -p ${APP_ROOT}
RUN chown ${APP_USER}:${APP_USER} ${APP_ROOT}

# Copy composer.json and composer.lock to the application directory
COPY composer.json composer.lock  ${APP_ROOT}/

## Create folder
RUN mkdir -p /var/log/php-fpm/
RUN mkdir -p /var/run/supervisord/

# Copy source
COPY --chown=${APP_USER}:${APP_USER} . ${APP_ROOT}/

# Install the dependencies

RUN if [ "${ENVIRONMENT}" != "local" ]; then export COMPOSER_PROCESS_TIMEOUT=900 && composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-progress \
    --no-dev \
    --prefer-dist \
    --ignore-platform-reqs; fi


# Init Log
RUN echo "init file" >> ${APP_ROOT}/storage/logs/laravel.log && chmod -R 777 storage/

# Expose ports
EXPOSE 8080

# Start Supervisor to run Nginx and PHP-FPM
CMD [ "./start-container.sh" ]
