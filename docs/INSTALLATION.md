# Installation Guide

## System Requirements

- PHP >= 8.2
- Composer
- Node.js >= 16.x
- npm or yarn
- SQLite (or MySQL/PostgreSQL for production)

## Local Development Setup

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/terumpah-kulit.git
cd terumpah-kulit
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Create database file (SQLite)
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed
```

### 5. Storage Link
```bash
# Create symbolic link for storage
php artisan storage:link
```

### 6. Compile Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 7. Start Development Server
```bash
php artisan serve
```

Your application will be available at `http://localhost:8000`

## Default Credentials

### Admin Account
- Email: admin@admin.com
- Password: admin123

### Test User Account
- Email: user@user.com
- Password: user123

## Production Deployment

### Server Requirements
- PHP 8.2+
- Web server (Apache/Nginx)
- SSL certificate
- Database server
- Composer
- Node.js & npm

### Deployment Steps

1. **Upload Code**
   ```bash
   git clone https://github.com/yourusername/terumpah-kulit.git
   cd terumpah-kulit
   ```

2. **Install Dependencies**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm ci --production
   npm run build
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   # Edit .env with production values
   php artisan key:generate
   ```

4. **Database Migration**
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

5. **Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache
   ```

6. **Web Server Configuration**
   Point document root to `public/` directory

### Environment Variables

```env
APP_NAME="Terumpah Kulit"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=terumpah_kulit
DB_USERNAME=username
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Troubleshooting

### Common Issues

1. **Permission Errors**
   ```bash
   sudo chown -R $USER:www-data storage
   sudo chown -R $USER:www-data bootstrap/cache
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```

2. **Database Connection**
   - Verify database credentials in `.env`
   - Ensure database server is running
   - Check firewall settings

3. **Composer Issues**
   ```bash
   composer clear-cache
   composer update --no-scripts
   ```

4. **Node.js Build Errors**
   ```bash
   rm -rf node_modules
   npm cache clean --force
   npm install
   ```

## Performance Optimization

### Caching
```bash
# Config cache
php artisan config:cache

# Route cache
php artisan route:cache

# View cache
php artisan view:cache
```

### Queue Workers (Production)
```bash
# Start queue worker
php artisan queue:work

# Supervisor configuration recommended
```

### Database Optimization
- Use appropriate indexes
- Enable query caching
- Consider read replicas for high traffic
