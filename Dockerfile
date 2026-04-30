FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias base y agregar PPA de PHP
RUN apt update && apt install -y software-properties-common ca-certificates lsb-release apt-transport-https curl gnupg2 unzip git \
    && add-apt-repository ppa:ondrej/php -y \
    && apt update

# Instalar Apache y PHP 8.5 con extensiones necesarias
RUN apt install -y \
    apache2 \
    libapache2-mod-php8.5 \
    php8.5 \
    php8.5-cli \
    php8.5-common \
    php8.5-xml \
    php8.5-curl \
    php8.5-gd \
    php8.5-mbstring \
    php8.5-zip \
    php8.5-bcmath \
    php8.5-intl \
    php8.5-mysql \
    && apt clean \
    && rm -rf /var/lib/apt/lists/*

# Habilitar PDO MySQL correctamente
RUN phpenmod -v 8.5 -s cli pdo_mysql
RUN phpenmod -v 8.5 -s apache2 pdo_mysql

# Habilitar módulo rewrite en Apache
RUN a2enmod rewrite

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar Composer desde la imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Exponer puerto 80
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apachectl", "-D", "FOREGROUND"]