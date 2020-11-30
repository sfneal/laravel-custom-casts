# Native image
FROM php:7.4-cli

# Enable debugging
RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Set default workdir
WORKDIR /var/www/html

# Keep spinning
CMD ["tail", "-f", "/dev/null"]