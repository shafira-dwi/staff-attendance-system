FROM dunglas/frankenphp:php8.3

WORKDIR /app

# PHP extensions needed by Laravel
RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js 20
RUN apt-get update && apt-get install -y \
    curl \
    ca-certificates \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copy Laravel project
COPY . .

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Install frontend dependencies and build Vite
RUN npm install
RUN npm run build

# Laravel writable directories
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

# Render uses PORT at runtime.
EXPOSE 10000

CMD ["sh", "-c", "frankenphp php-server --host 0.0.0.0 --port ${PORT:-10000} -r public/"]