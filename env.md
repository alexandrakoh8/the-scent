Here's a **complete sample `.env` file** for **The Scent E-Commerce Platform** (Laravel 10.x). This file includes all necessary configurations for the application, database, Stripe payments, email, and other services.

**`.env` File:**
```env
# --------------------------------------------------------------------------
# Application Settings
# --------------------------------------------------------------------------
APP_NAME="The Scent"
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://the-scent.com

# --------------------------------------------------------------------------
# Timezone & Locale
# --------------------------------------------------------------------------
APP_TIMEZONE=UTC
APP_LOCALE=en
APP_FALLBACK_LOCALE=en

# --------------------------------------------------------------------------
# Database Configuration
# --------------------------------------------------------------------------
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=the_scent_db
DB_USERNAME=the_scent_user
DB_PASSWORD=secure_password

# --------------------------------------------------------------------------
# Redis Configuration (Optional)
# --------------------------------------------------------------------------
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# --------------------------------------------------------------------------
# Cache & Session Settings
# --------------------------------------------------------------------------
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_CONNECTION=sync

# --------------------------------------------------------------------------
# Email Configuration (SMTP Example with Mailgun)
# --------------------------------------------------------------------------
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@the-scent.com
MAIL_PASSWORD=your_mailgun_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@the-scent.com
MAIL_FROM_NAME="${APP_NAME}"

# --------------------------------------------------------------------------
# Stripe Payment Gateway
# --------------------------------------------------------------------------
STRIPE_KEY=pk_test_XXXXXXXXXXXXXXXXXXXXXXXXXXXX
STRIPE_SECRET=sk_test_XXXXXXXXXXXXXXXXXXXXXXXXXXXX
STRIPE_WEBHOOK_SECRET=whsec_XXXXXXXXXXXXXXXXXXXXXXXXXXXX

# --------------------------------------------------------------------------
# Google reCAPTCHA (Optional for Forms)
# --------------------------------------------------------------------------
RECAPTCHA_SITE_KEY=XXXXXXXXXXXXXXXXXXXXXXXXXXXX
RECAPTCHA_SECRET_KEY=XXXXXXXXXXXXXXXXXXXXXXXXXXXX

# --------------------------------------------------------------------------
# Google Analytics (Optional)
# --------------------------------------------------------------------------
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXXXXXXXXXXXX

# --------------------------------------------------------------------------
# Laravel Telescope (Optional for Debugging)
# --------------------------------------------------------------------------
TELESCOPE_ENABLED=true

# --------------------------------------------------------------------------
# AWS S3 Storage (Optional for File Uploads)
# --------------------------------------------------------------------------
AWS_ACCESS_KEY_ID=XXXXXXXXXXXXXXXXXXXX
AWS_SECRET_ACCESS_KEY=XXXXXXXXXXXXXXXXXXXX
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=the-scent-bucket
AWS_USE_PATH_STYLE_ENDPOINT=false

# --------------------------------------------------------------------------
# Logging & Debugging
# --------------------------------------------------------------------------
LOG_CHANNEL=stack
LOG_LEVEL=debug

# --------------------------------------------------------------------------
# Broadcasting (Optional for Real-Time Features)
# --------------------------------------------------------------------------
BROADCAST_DRIVER=log
PUSHER_APP_ID=XXXXXXXXXXXXXXXXXXXX
PUSHER_APP_KEY=XXXXXXXXXXXXXXXXXXXX
PUSHER_APP_SECRET=XXXXXXXXXXXXXXXXXXXX
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https

# --------------------------------------------------------------------------
# SSL Certificate (Certbot)
# --------------------------------------------------------------------------
SSL_CERT_PATH=/etc/letsencrypt/live/the-scent.com/fullchain.pem
SSL_KEY_PATH=/etc/letsencrypt/live/the-scent.com/privkey.pem
```

**Explanation of Each Section:**
1. **Application Settings**:
   - `APP_NAME`: Your app's name (e.g., "The Scent").
   - `APP_ENV`: `production` for live sites, `local` for development.
   - `APP_KEY`: Generate using `php artisan key:generate`.
   - `APP_DEBUG`: Set to `false` in production to hide errors.

2. **Database Configuration**:
   - `DB_DATABASE`: Name of your MySQL database (`the_scent_db`).
   - `DB_USERNAME` / `DB_PASSWORD`: MySQL user credentials.

3. **Redis** (Optional):
   - Used for caching and sessions. Uncomment if installed.

4. **Email (SMTP)**:
   - Configured for Mailgun. Replace with your SMTP details:
     - `MAIL_USERNAME`: Your Mailgun SMTP login.
     - `MAIL_PASSWORD`: Your Mailgun SMTP password.

5. **Stripe Payments**:
   - `STRIPE_KEY`: Public key (starts with `pk_test_`).
   - `STRIPE_SECRET`: Secret key (starts with `sk_test_`).
   - Get keys from [Stripe Dashboard](https://dashboard.stripe.com/).

6. **reCAPTCHA** (Optional):
   - For form protection. Get keys from [Google reCAPTCHA](https://www.google.com/recaptcha/).

7. **Google Analytics** (Optional):
   - Track site analytics. Get ID from [Google Analytics](https://analytics.google.com/).

8. **AWS S3** (Optional):
   - For storing product images or files. Uncomment if using S3.

9. **Logging**:
   - `LOG_LEVEL=debug` for development, `LOG_LEVEL=error` for production.

10. **SSL Paths**:
    - Used by Certbot for HTTPS configuration.

**How to Generate `APP_KEY`:**
```bash
php artisan key:generate
```
This will update the `.env` file with a new `APP_KEY`.

**Tips for Production**:
1. Set `APP_DEBUG=false` to hide sensitive errors.
2. Use a strong `DB_PASSWORD` and limit MySQL user privileges.
3. Test email configuration with `php artisan tinker`:
   ```php
   Mail::raw('Test email', function ($message) {
       $message->to('your-email@example.com')->subject('Test');
   });
   ```
4. Ensure `STRIPE_SECRET` is secure and never exposed publicly.

**Backup `.env` Securely**:
- Never commit `.env` to Git. Add it to `.gitignore`:
  ```plaintext
  /.env
  ```
- Store a backup securely (e.g., encrypted cloud storage).

Now, your Laravel application is fully configured and ready for production! 🚀

**Verify Configuration**:
1. Run `php artisan config:cache`.
2. Test the site: `https://the-scent.com`.
3. Check logs: `tail -f storage/logs/laravel.log`.

