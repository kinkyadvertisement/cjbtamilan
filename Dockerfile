FROM php:8.1-cli

# Install common system deps & PHP extensions (adjust as needed)
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
  && docker-php-ext-install pdo pdo_mysql zip \
  && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Copy composer if you use it
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app into container
COPY . /app

# Install composer deps if composer.json exists
RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader --no-interaction; fi

# Ensure files are readable
RUN chown -R www-data:www-data /app || true

# Expose common port
EXPOSE 8080

# Run PHP built-in server and bind to PORT provided by Render (default to 8080)
CMD ["sh", "-lc", "php -S 0.0.0.0:${PORT:-8080} -t ${WEB_ROOT:-/app}"]
