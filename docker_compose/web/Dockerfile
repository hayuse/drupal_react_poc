FROM php:8.3-apache

COPY ./drupal-react-poc/ /var/www/html/
COPY ./docker_compose/web/conf/ /etc/apache2/

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get -y install \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libxml2-dev \
        libzip-dev \
        unzip \
        curl \
        vim \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd xml zip opcache pdo pdo_mysql \
    && a2enmod rewrite \
    && chown -R www-data:www-data /var/www/html

# ServerName設定の追加
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# ドキュメントルートの指定 (Drupalのデフォルトディレクトリに設定)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/web
ENV DRUPAL_ROOT=/var/www/html

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require drush/drush
RUN curl -OL https://github.com/drush-ops/drush-launcher/releases/latest/download/drush.phar \
    && chmod +x drush.phar \
    && mv drush.phar /usr/local/bin/drush
ENV DRUSH_LAUNCHER_FALLBACK=/var/www/html/vendor/bin/drush


# Apacheの設定変更
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80