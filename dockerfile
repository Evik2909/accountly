# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

# Instala las extensiones de PHP necesarias, como mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia el código de tu aplicación a la carpeta pública de Apache
COPY ./php_app/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html
# Establece el directorio de trabajo
WORKDIR /var/www/html/


