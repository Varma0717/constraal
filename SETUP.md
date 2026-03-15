# Constraal Website — Setup Guide

This is a production-ready Laravel 10 corporate website for Constraal robotics company. Follow these steps to set up locally or in production.

## Prerequisites

- PHP 8.1+
- Composer
- MySQL 8.0+ or PostgreSQL 14+
- Node.js 18+

## Local Development Setup

### 1. Clone/extract and install dependencies

```bash
cd c:\xampp\htdocs\constraal
composer install
npm install
```

### 2. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Then edit `.env`:

- Set `DB_DATABASE=constraal`, `DB_USERNAME=root`, `DB_PASSWORD=` (for XAMPP default)
- Set `MAIL_FROM_ADDRESS=noreply@constraal.example`
- Set `ADMIN_EMAIL=admin@constraal.example`
- For testing: use Mailtrap or local mail driver (set `MAIL_DRIVER=log`)

### 3. Create database and run migrations

```bash
php artisan migrate
php artisan db:seed
```

This creates:

- Users table with admin user
- Roles table (Admin, Editor, Hiring Manager)
- Default admin: `admin@constraal.example` / `ChangeMe123!` (change immediately)
- Pages, Jobs, Inquiries, Job Applications tables

### 4. Build frontend assets

```bash
npm run build
```

For development (watch mode):

```bash
npm run dev
```

### 5. Publish Filament assets (one-time)

```bash
php artisan vendor:publish --tag=filament-config
php artisan vendor:publish --tag=filament-panels
php artisan vendor:publish --tag=filament-tables
php artisan vendor:publish --tag=filament-forms
```

### 6. Run the app

```bash
php artisan serve
```

Visit:

- **Public site**: `http://localhost:8000`
- **Admin panel**: `http://localhost:8000/admin` (login with admin credentials)

---

## Filament Admin Setup Details

### Admin Authentication

- Filament uses Laravel's built-in authentication guard (`web` by default)
- All admin routes are protected via `Filament\Http\Middleware\Authenticate`
- No public signup — only seeded admin user and admins can create new users

### Creating Additional Admin Users

Via Filament UI (logged in):

1. Navigate to `/admin/users`
2. Click "New user"
3. Set name, email, password
4. Assign role (Admin, Editor, Hiring Manager)

### Admin Panel Resources

Available in Filament dashboard:

- **Users** — Manage admin users and roles
- **Pages** — Edit static pages (Technology, About, etc.)
- **Homepage Sections** — Manage hero, technology core, safety messaging
- **Jobs** — Create and edit job listings by category
- **Job Applications** — View applicants, download resumes, manage status
- **Inquiries** — Manage contact form submissions and partnership requests

### Secure Resume Uploads

- Resumes stored in `storage/app/resumes/` (not web-accessible)
- Admin can download via `/admin/resume/{application}` (auth-protected)
- Max file size: 5MB
- Allowed types: PDF, DOC, DOCX
- Spam protection: honeypot field on job application form

---

## Email Configuration

### Development (Mailtrap)

Sign up at [mailtrap.io](https://mailtrap.io), then in `.env`:

```env
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
```

### Development (Log)

For testing without sending real emails:

```env
MAIL_DRIVER=log
```

Emails will appear in `storage/logs/laravel.log`.

### Production

Set up with your email provider (SendGrid, AWS SES, etc.):

```env
MAIL_DRIVER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=SG.xxxxx
MAIL_ENCRYPTION=tls
```

---

## Security Checklist

Before going to production:

- [ ] Change `APP_DEBUG=false` in `.env`
- [ ] Set `APP_ENV=production`
- [ ] Use strong `APP_KEY` (generated via `php artisan key:generate`)
- [ ] Change default admin password immediately (`admin@constraal.example`)
- [ ] Configure real email service (SendGrid, AWS SES, Mailgun)
- [ ] Set up HTTPS/SSL certificate
- [ ] Use strong database password
- [ ] Configure file storage (S3 recommended for production)
- [ ] Enable CORS if needed for future API integrations
- [ ] Set up error logging and monitoring (Sentry, Rollbar)
- [ ] Back up database regularly
- [ ] Review and test all form submissions

---

## Production Deployment

### Recommended: Laravel Forge, DigitalOcean App Platform, or AWS

1. Push code to Git repository
2. Configure environment on hosting platform
3. Set up database and run migrations: `php artisan migrate --force`
4. Build assets: `npm run build`
5. Clear caches: `php artisan config:cache && php artisan route:cache`

### Self-hosted (VPS)

1. Set up PHP 8.1+, MySQL/PostgreSQL, Nginx/Apache
2. Clone repository from Git
3. Install dependencies: `composer install --no-dev`
4. Configure `.env` for production (strong DB password, real email service)
5. Run migrations: `php artisan migrate`
6. Build assets: `npm run build`
7. Set up Nginx/Apache vhost with SSL
8. Configure file permissions: `chmod -R 755 storage/ bootstrap/cache/`
9. Set up cron for Laravel scheduler (if used in future)
10. Enable OPcache and other PHP performance optimizations

---

## Troubleshooting

**"SQLSTATE[HY000]: General error: 1030 Got error..."**

- Check database connection in `.env`
- Ensure database exists: `CREATE DATABASE constraal;`
- Verify MySQL is running

**"Class not found" errors**

- Run `composer dump-autoload`
- Clear caches: `php artisan cache:clear`

**"Filament admin not accessible"**

- Ensure migrations ran: `php artisan migrate`
- Check `FILAMENT_PATH` in `.env` (default: `/admin`)
- Clear caches: `php artisan cache:clear && php artisan route:cache`
- Verify auth middleware: check `Filament\Http\Middleware\Authenticate`

**Resume uploads not working**

- Check `storage/app/resumes/` directory exists and is writable
- Run `php artisan storage:link` if using public disk
- Check file permissions: `chmod -R 755 storage/`

**Emails not sending**

- Check MAIL_* vars in `.env`
- Test with `MAIL_DRIVER=log` to debug
- Use Mailtrap for development/testing
- Check admin email set in `ADMIN_EMAIL` var

**"TokenMismatchException" on form submission**

- Ensure CSRF token is in forms: `@csrf` directive
- Clear browser cookies and try again

---

## Architecture Overview

### Public Site (No Authentication Required)

- **Homepage** — Hero, technology overview, call-to-action
- **Pages** — Technology, Robotics, Home Systems, Appliances, Safety, About, Careers
- **Careers** — List active job listings
- **Job Application Form** — Resume upload (secure, 5MB max), cover letter
- **Contact Form** — Inquiries, partnerships, press, early interest

### Admin Panel (Authentication Required)

- **Dashboard** — Overview of inquiries, job applications
- **Content Management** — Edit homepage sections, static pages
- **Job Management** — Create/edit jobs, view applications, download resumes
- **Inquiry Management** — View contact submissions, manage status
- **User Management** — Create admins, assign roles

### Database Schema

- `users` — Admin accounts
- `roles` — Admin roles (Admin, Editor, Hiring Manager)
- `role_user` — Role assignments
- `pages` — Static page content
- `homepage_sections` — Dynamic homepage sections
- `jobs` — Job listings
- `job_applications` — Applications + resume storage
- `inquiries` — Contact form submissions
- `uploads` — File metadata (future use)

### Security Features

- CSRF protection on all forms
- Honeypot spam protection (contact & job forms)
- Secure resume uploads (validated MIME types, size limited)
- Admin routes protected by Filament auth middleware
- Role-based access control
- No public authentication required

---

## Future-Ready Architecture

This system is designed to scale later. Areas ready for expansion:

- **Customer portals** — Add authenticated customer section
- **Partner documentation** — Protected partner resources
- **Product dashboards** — Device control and monitoring
- **API** — REST/GraphQL endpoints for future integrations
- **Support tickets** — Ticketing system for customer support
- **Analytics** — User behavior tracking and reporting

---

## Support

For questions or technical support, contact the Constraal engineering team.
