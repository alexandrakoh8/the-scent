# Deployment Guide for The Scent E-commerce Platform

## 1. Generate Security Keys and Values

```bash
# Generate Laravel application key
php artisan key:generate --force

# Generate secure passwords (copy these values for use in .env)
echo "Database Password: $(openssl rand -base64 32)"
echo "Redis Password: $(openssl rand -base64 24)"
echo "Mail Password: $(openssl rand -base64 32)"
```

## 2. SSL Certificate Setup with Certbot

```bash
# Install Certbot
sudo apt install certbot python3-certbot-apache

# Generate SSL certificate
sudo certbot --apache -d the-scent.com -d www.the-scent.com

# Test auto-renewal
sudo certbot renew --dry-run
```

## 3. File Permissions Setup

```bash
# Set ownership
sudo chown -R www-data:www-data /var/www/the-scent

# Set directory permissions
sudo find /var/www/the-scent -type d -exec chmod 755 {} \;

# Set file permissions
sudo find /var/www/the-scent -type f -exec chmod 644 {} \;

# Set storage and cache permissions
sudo chmod -R 775 /var/www/the-scent/storage
sudo chmod -R 775 /var/www/the-scent/bootstrap/cache
```

## 4. Laravel Cache Configuration

```bash
# Clear all caches first
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate optimized caches
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

## 5. Redis Installation and Setup

```bash
# Install Redis
sudo apt install redis-server

# Configure Redis to use systemd
sudo systemctl enable redis-server
sudo systemctl start redis-server

# Test Redis connection
redis-cli ping
```

## 6. Cron Job Setup for Laravel Scheduler

```bash
# Open crontab editor
crontab -e

# Add this line to the crontab
* * * * * cd /var/www/the-scent && php artisan schedule:run >> /dev/null 2>&1
```

## 7. Apache Virtual Host Configuration

```bash
# Create virtual host file
sudo nano /etc/apache2/sites-available/the-scent.conf

# Add this configuration
<VirtualHost *:80>
    ServerName the-scent.com
    ServerAlias www.the-scent.com
    DocumentRoot /var/www/the-scent/public

    <Directory /var/www/the-scent/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/the-scent_error.log
    CustomLog ${APACHE_LOG_DIR}/the-scent_access.log combined
</VirtualHost>

# Enable site and required modules
sudo a2ensite the-scent.conf
sudo a2enmod rewrite
sudo systemctl restart apache2
```

## 8. Post-Deployment Verification Checklist

1. Test Laravel Environment:
```bash
php artisan --version
php artisan env
```

2. Verify Database Connection:
```bash
php artisan migrate:status
```

3. Test Redis Connection:
```bash
php artisan tinker
>>> Redis::ping()
```

4. Check SSL Certificate:
```bash
curl -vI https://the-scent.com
```

5. Verify File Permissions:
```bash
ls -la /var/www/the-scent/storage
ls -la /var/www/the-scent/bootstrap/cache
```

## 9. Security Reminders

1. Update `.env` file with generated secure passwords
2. Store SSL certificate details securely
3. Keep backup of generated keys and passwords in a secure location
4. Configure firewall rules to allow only necessary ports
5. Set up regular backup schedule for database and files

## 10. Monitoring Setup

```bash
# Install Laravel Telescope (Development)
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate

# Monitor Laravel logs
tail -f /var/www/the-scent/storage/logs/laravel.log

# Monitor Apache error logs
tail -f /var/log/apache2/the-scent_error.log
```

## 11. Backup Configuration

```bash
# Set up database backup
mysqldump -u [user] -p the_scent_db > backup_$(date +%Y%m%d).sql

# Set up file backup
tar -czf backup_$(date +%Y%m%d).tar.gz /var/www/the-scent
```

Remember to replace placeholder values with actual secure values and domain names before deploying to production.
