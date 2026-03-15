# Constraal — Corporate Website

Production-ready Laravel 10 + Filament corporate website for Constraal robotics company. Secure, scalable, and designed for credibility.

## Overview

This is a **corporate informational website** — not e-commerce, not a sales funnel, not a device dashboard. It's engineered for:

- Trust and credibility
- Engineering-focused messaging
- Secure job applications and inquiries
- Admin management of content, jobs, and applicants

**Key Features:**

- Public website with zero authentication required
- Secure admin panel (Filament) for managing content, jobs, and inquiries
- Job application workflow with resume uploads
- Contact form with inquiry categorization
- Email notifications for job applications and inquiries
- Spam protection (honeypot)
- Role-based admin access

## Quick Start

### Windows (PowerShell)

```powershell
powershell -ExecutionPolicy Bypass -File setup.ps1
```

### macOS / Linux

```bash
bash setup.sh
```

### Manual Setup

See [SETUP.md](SETUP.md) for detailed instructions.

## Project Structure

```
constraal/
├── app/
│   ├── Http/Controllers/      # Public & job app controllers
│   ├── Mail/                  # Email notification classes
│   ├── Models/                # Eloquent models
│   ├── Filament/              # Admin panel resources
│   └── Providers/
├── config/
│   └── filament.php           # Filament configuration
├── database/
│   ├── migrations/            # Database schema
│   └── seeders/               # Default roles & admin user
├── resources/
│   ├── css/                   # Tailwind styles
│   ├── js/                    # Alpine.js (minimal)
│   └── views/
│       ├── layouts/           # Base layout
│       ├── emails/            # Email templates
│       └── jobs/              # Job application form
├── routes/
│   ├── web.php                # Public routes
│   └── admin.php              # Admin routes
├── storage/
│   └── app/resumes/           # Secure resume uploads
├── .env.example               # Environment template
├── composer.json              # PHP dependencies
├── package.json               # Node.js dependencies
├── tailwind.config.js         # Tailwind configuration
├── vite.config.js             # Frontend build tool
├── SETUP.md                   # Detailed setup guide
└── setup.ps1 / setup.sh       # Automated setup scripts
```

## Tech Stack

- **Framework**: Laravel 10
- **Admin Panel**: Filament 3
- **Frontend**: Tailwind CSS + Alpine.js
- **Database**: MySQL 8.0+ or PostgreSQL 14+
- **Build**: Vite
- **Auth**: Laravel built-in (Filament admin only)

## Pages

### Public (No Auth Required)

- **Home** — Hero, technology, safety, call-to-action
- **Technology** — Embedded systems, on-device intelligence
- **Robotics** — Human-aware motion, home-safe systems
- **Home Systems** — Environmental sensing, device coordination
- **Appliances** — Embedded intelligence in appliances
- **Safety** — Philosophy, reliability, privacy
- **About** — Constraal mission and culture
- **Careers** — Active job listings and application form
- **Contact** — Inquiry form (general, partnership, press, early interest)

### Admin (Auth Required, `/admin`)

- **Dashboard** — Overview of inquiries and applications
- **Users** — Manage admin accounts and roles
- **Pages** — Edit static page content
- **Homepage Sections** — Edit hero, technology sections
- **Jobs** — Create/edit job listings
- **Job Applications** — View applications, download resumes
- **Inquiries** — View contact submissions, manage status

## Environment Setup

Copy `.env.example` to `.env` and configure:

```env
# Database
DB_DATABASE=constraal
DB_USERNAME=root
DB_PASSWORD=

# Mail (required for notifications)
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=noreply@constraal.example

# Admin email for notifications
ADMIN_EMAIL=admin@constraal.example
```

## Security

✅ **CSRF protection** on all forms
✅ **Honeypot spam protection** on contact and job forms
✅ **Secure file uploads** — validated MIME types, 5MB max
✅ **Admin auth** — Filament middleware protects all admin routes
✅ **Role-based access** — Admin, Editor, Hiring Manager roles
✅ **No public signup** — only seeded admin user
✅ **Resume storage** — files stored outside web root (`storage/app/resumes/`)

## Default Admin Credentials

**Email**: `admin@constraal.example`
**Password**: `ChangeMe123!`

⚠️ **Change immediately after first login!**

## Database Schema

| Table | Purpose |
|-------|---------|
| `users` | Admin accounts |
| `roles` | Admin roles (Admin, Editor, Hiring Manager) |
| `role_user` | Role assignments |
| `pages` | Static page content |
| `homepage_sections` | Dynamic homepage sections |
| `jobs` | Job listings |
| `job_applications` | Applications + resume paths |
| `inquiries` | Contact form submissions |

## Email Configuration

### Development

Use Mailtrap (free) for testing:

1. Sign up at <https://mailtrap.io>
2. Copy SMTP credentials to `.env`
3. Applications and inquiries will appear in Mailtrap inbox

### Production

Configure with your email provider:

- SendGrid
- AWS SES
- Mailgun
- Microsoft 365

See [SETUP.md](SETUP.md) for detailed mail setup.

## Deployment

### Recommended

- **Laravel Forge** — Easiest for Laravel apps
- **DigitalOcean App Platform** — Simple one-click deployment
- **Heroku** — Good for prototyping (costs scale with app usage)
- **AWS / Azure / GCP** — Full control, requires more setup

### Self-hosted

1. Set up PHP 8.1+, MySQL/PostgreSQL, Nginx/Apache
2. Clone repository from Git
3. Run composer install and npm build
4. Configure `.env` for production
5. Run migrations and seed
6. Set up SSL/TLS certificate

See [SETUP.md](SETUP.md) for full deployment guide.

## Future-Ready

This system is architected for future expansion:

- **Customer portals** — Authenticated user dashboards
- **Partner documentation** — Secure partner resources
- **Product dashboards** — Device control and monitoring
- **APIs** — REST/GraphQL endpoints for integrations
- **Support ticketing** — Help desk system
- **Analytics** — User behavior and performance tracking

## Troubleshooting

| Issue | Solution |
|-------|----------|
| Database connection error | Check `.env` DB credentials and ensure MySQL is running |
| Filament admin not loading | Run `php artisan cache:clear && php artisan route:cache` |
| Resume uploads not working | Check `storage/app/resumes/` is writable: `chmod -R 755 storage/` |
| Emails not sending | Use `MAIL_DRIVER=log` to debug, or test with Mailtrap |

See [SETUP.md](SETUP.md) for more troubleshooting.

## Architecture Philosophy

This website prioritizes:

- **Clarity** — Simple, maintainable code
- **Trust** — Professional, secure design
- **Credibility** — Engineering-focused messaging
- **Reliability** — Fail-safe systems, privacy-respecting
- **Scalability** — Ready to grow without major refactoring

## License

Proprietary — Constraal Inc.

## Support

For questions or technical support, contact the Constraal engineering team.
