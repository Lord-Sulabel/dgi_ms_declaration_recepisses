# Définir l'image de base
FROM php:8.0-apache

# Copier les fichiers de l'application dans le conteneur
WORKDIR /var/www/html

COPY . .

# Installer les dépendances de l'application
RUN apt-get update && \
    apt-get install -y \
        libicu-dev \
        libzip-dev \
        zip \
        unzip \
        wget \
        gnupg2 \
        git && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl  zip && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev


RUN wget -qO- https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN wget -qO-  https://packages.microsoft.com/config/ubuntu/22.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

RUN apt-get update

RUN apt-get -y install unixodbc-dev

RUN ACCEPT_EULA=Y apt-get -y install msodbcsql17

RUN pecl install sqlsrv 

RUN pecl install pdo_sqlsrv

RUN echo "extension=sqlsrv.so" >> /usr/local/etc/php/conf.d/sqlsrv.ini && \
    echo "extension=pdo_sqlsrv.so" >> /usr/local/etc/php/conf.d/pdo_sqlsrv.ini && \
    docker-php-ext-enable sqlsrv pdo_sqlsrv

RUN service apache2 restart

# Exposer le port 80 pour Apache
EXPOSE 8000

# COPY 000-default.conf /etc/apache2/sites-available/

# RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# RUN a2ensite 000-default.conf

# RUN service apache2 restart

# RUN chmod -R 777 /var/www/html/storage

# Lancer Apache au démarrage du conteneur
CMD php artisan serve  --port=8000 --host=0.0.0.0