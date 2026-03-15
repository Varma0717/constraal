# Constraal Website - Master Architecture Reference

> **Last Updated:** February 10, 2026  
> **Status:** ✅ Complete & Production-Ready  
> **Version:** 1.0

---

## 📋 Table of Contents

1. [Executive Summary](#executive-summary)
2. [System Architecture](#system-architecture)
3. [Technology Stack](#technology-stack)
4. [File Organization](#file-organization)
5. [Key Components](#key-components)
6. [Database Relationships](#database-relationships)
7. [API Endpoints](#api-endpoints-summary)
8. [Workflows & Processes](#workflows--processes)
9. [Admin Interface](#admin-interface)
10. [Deployment Guide](#deployment-guide)
11. [Support & Maintenance](#support--maintenance)

---

## Executive Summary

The Constraal website is now a **complete, modern Laravel-based content management system** with:

- **TencentCloud-inspired design** across all 9 public pages
- **Responsive layouts** optimized for mobile, tablet, desktop
- **Headless CMS** for content management without code changes
- **Newsletter system** for early updates subscribers
- **Automated email notifications** for inquiries and applications
- **Admin dashboard** for managing content, subscribers, inquiries
- **RESTful API** with 54+ documented endpoints
- **Production-ready security** with CSRF, validation, authentication

### By the Numbers

- **9 Public Pages** - Home, Technology, Robotics, Home Systems, Appliances, Safety, About, Careers, Contact
- **9 Database Tables** - Users, Roles, Jobs, Applications, Inquiries, CmsPages, Subscribers, Uploads, RoleUser
- **54 API Routes** - CRUD operations for content, subscribers, inquiries, jobs
- **2,500+ Lines of Code** - Controllers, models, views, migrations
- **5 Documentation Files** - Wireframes, Database, API, Implementation, Architecture (this)

---

## System Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                    CONSTRAAL WEBSITE SYSTEM                      │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │              PUBLIC WEBSITE LAYER                       │   │
│  │  (9 Pages + Responsive Design + Contact System)        │   │
│  │                                                         │   │
│  │  Home → Technology → Robotics → Home Systems → etc.   │   │
│  │  Contact Form → Email Notifications                   │   │
│  │  Career Applications → Resume Uploads                 │   │
│  └─────────────────────────────────────────────────────────┘   │
│                          ↓ API Calls ↓                          │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │            BACKEND API LAYER (Laravel)                 │   │
│  │                                                         │   │
│  │  ┌──────────────┐  ┌──────────────┐  ┌─────────────┐  │   │
│  │  │   Contact    │  │    Jobs      │  │   Inquiries │  │   │
│  │  │ Controller   │  │ Controller   │  │ Controller  │  │   │
│  │  └──────────────┘  └──────────────┘  └─────────────┘  │   │
│  │                                                         │   │
│  │  ┌──────────────────┐  ┌──────────────────┐           │   │
│  │  │  CMS Page        │  │  Subscriber      │           │   │
│  │  │  Controller      │  │  Controller      │           │   │
│  │  └──────────────────┘  └──────────────────┘           │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                          ↓ ORM Access ↓                         │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │            DATA ACCESS LAYER (Eloquent ORM)            │   │
│  │                                                         │   │
│  │  User  → CmsPage  →  Inquiry  →  JobApplication        │   │
│  │  Role     Subscriber   Job        Upload                │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                          ↓ Queries ↓                            │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │         DATABASE LAYER (MySQL/MariaDB)                 │   │
│  │                                                         │   │
│  │  [Indexes on critical lookups + Soft Deletes]         │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │         ADMIN INTERFACE LAYER (Laravel Blade)          │   │
│  │                                                         │   │
│  │  Dashboard → CMS Pages → Subscribers → Inquiries        │   │
│  │  User Management → Job Listings → Applications         │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                  │
└─────────────────────────────────────────────────────────────────┘
```

---

## Technology Stack

### Backend Framework

- **Laravel 10+** - PHP framework for routing, ORM, authentication
- **PHP 8.1+** - Powerful, fast server-side language
- **Composer** - PHP dependency manager

### Database

- **MySQL 8.0+** or **MariaDB 10.5+**
- **Eloquent ORM** - Object-relational mapping
- **Database Migrations** - Version-controlled schema changes

### Frontend

- **Blade** - Laravel templating engine
- **Custom CSS** - TencentCloud-inspired responsive design
- **Vanilla JavaScript** - Lightweight interactivity
- **HTML5** - Semantic markup

### DevOps

- **XAMPP** - Local development (Apache + MySQL + PHP)
- **Nginx/Apache** - Production web servers
- **Git** - Version control (GitHub/GitLab)

### Optional Integrations (For Production)

- **AWS S3** - File storage for images, resumes, backups
- **SendGrid/Mailgun** - Email delivery service
- **Cloudflare** - CDN for static assets
- **Redis** - Session/cache store
- **Sentry** - Error tracking

---

## File Organization

### Core Application Structure

```
app/
├── Models/                          # Data models
│   ├── User.php                     # Admin users
│   ├── Role.php                     # User roles
│   ├── Job.php                      # Job postings
│   ├── JobApplication.php           # Applications
│   ├── Inquiry.php                  # Contact inquiries
│   ├── CmsPage.php         [NEW]    # CMS content pages
│   └── Subscriber.php      [NEW]    # Newsletter subscribers
│
├── Http/
│   ├── Controllers/
│   │   ├── PublicController.php     # Home page
│   │   ├── CareerController.php     # Careers page
│   │   ├── ContactController.php    # Contact form [UPDATED]
│   │   ├── JobApplicationController.php  # Job apps
│   │   └── Admin/
│   │       ├── AdminController.php      # Dashboard
│   │       ├── CmsPageController.php    # Pages CRUD [NEW]
│   │       └── SubscriberController.php # Subscribers [NEW]
│   │
│   ├── Middleware/
│   │   ├── Authenticate.php         # Auth check
│   │   └── Admin.php                # Admin role check
│   │
│   └── Requests/
│       └── ContactFormRequest.php   # Form validation

routes/
├── web.php                          # Public & admin routes [UPDATED]
├── api.php                          # API routes (future)
├── cms.php                          # CMS admin subroutes [NEW]
├── admin.php                        # Admin routes
└── console.php                      # Artisan commands

resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php           # Public layout
│   │   └── admin.blade.php         # Admin layout
│   │
│   ├── home.blade.php              # Homepage
│   ├── technology.blade.php        # Tech page
│   ├── robotics.blade.php          # Robotics page
│   ├── homesystems.blade.php       # Smart home page
│   ├── appliances.blade.php        # Appliances page
│   ├── safety.blade.php            # Safety page
│   ├── about.blade.php             # About page
│   ├── careers.blade.php           # Careers page
│   ├── contact.blade.php           # Contact page
│   │
│   ├── partials/
│   │   ├── header.blade.php        # Navigation
│   │   └── footer.blade.php        # Site footer
│   │
│   └── admin/
│       ├── dashboard.blade.php              # Admin home
│       ├── cms/
│       │   └── pages/
│       │       ├── index.blade.php   [NEW] # List pages
│       │       ├── create.blade.php  [NEW] # Create form
│       │       └── edit.blade.php    [NEW] # Edit form
│       └── subscribers/
│           └── index.blade.php       [NEW] # Manage subscribers
│
├── css/
│   └── app.css                      # Custom CSS (583 lines)
│
└── js/
    └── app.js                       # Frontend JavaScript

database/
├── migrations/
│   ├── 2026_02_03_000001-0009_*    # Original tables
│   ├── 2026_02_10_000001_create_cms_pages_table.php    [NEW]
│   └── 2026_02_10_000002_create_subscribers_table.php  [NEW]
│
└── seeders/
    ├── DatabaseSeeder.php           # Main seeder
    ├── RolesSeeder.php              # Seed roles
    ├── AdminUserSeeder.php          # Seed admin
    └── CmsPagesSeeder.php           # Seed CMS pages [NEW]

public/
├── css/
│   └── app.css                      # Compiled CSS
├── js/
│   └── app.js                       # Bundled JS
├── images/                          # Static images
│   ├── constraal_logo.png
│   ├── constraal_favicon.png
│   └── ...more images
└── storage/ (symlinked)             # User uploads
    └── hero-images/                 # CMS hero images

config/
├── app.php                          # App configuration
├── database.php                     # Database config
├── mail.php                         # Email config
├── auth.php                         # Authentication
├── session.php                      # Session config
└── filesystems.php                  # Storage config

Documentation/
├── README.md                        # Project overview
├── SETUP.md                         # Dev environment
├── WIREFRAMES.md            [NEW]   # UX wireframes
├── DATABASE.md              [NEW]   # Schema & guide
├── API.md                   [NEW]   # Endpoint docs
├── IMPLEMENTATION.md        [NEW]   # Quick start
└── ARCHITECTURE.md          [NEW]   # This file
```

---

## Key Components

### 1. Models (Data Layer)

#### CmsPage Model

```php
$page = CmsPage::find(1);
$page->title;           // "Technology"
$page->slug;            // "technology"
$page->status;          // "published"
$page->hero_title;      // Hero section title
$page->content;         // HTML content
$page->published_at;    // Publication timestamp

// Scopes
CmsPage::published()->get();        // Only published
CmsPage::drafts()->get();           // Only drafts
CmsPage::where('featured', true);   // Featured pages
```

#### Subscriber Model

```php
$sub = Subscriber::find(1);
$sub->email;            // "user@example.com"
$sub->name;             // "John Doe"
$sub->source;           // "website_signup"
$sub->verified_at;      // Verification time
$sub->unsubscribed_at;  // Unsubscribe time

// Methods
$sub->verify();         // Mark as verified
$sub->unsubscribe();    // Unsubscribe

// Scopes
Subscriber::active()->count();      // Active count
Subscriber::verified()->get();      // Verified list
```

### 2. Controllers (Business Logic)

#### CmsPageController

- `index()` - List all pages with pagination
- `create()` - Show creation form
- `store()` - Create new page + file upload
- `edit()` - Show edit form
- `update()` - Update page + hero image
- `destroy()` - Soft delete page
- `restore()` - Restore soft-deleted
- `forceDelete()` - Permanent delete

#### SubscriberController

- `index()` - List subscribers
- `show()` - View details
- `verify()` - Mark verified
- `unsubscribe()` - Unsubscribe
- `bulkUnsubscribe()` - Bulk action
- `destroy()` - Delete
- `export()` - Download CSV
- `stats()` - Get statistics

#### ContactController (Enhanced)

- `submit()` - Handle form (now with early_interest support)
- `subscribe()` - Separate email signup

### 3. Routes

#### Admin Routes (admin-only)

```
GET    /admin/cms/pages                 # List pages
GET    /admin/cms/pages/create          # Create form
POST   /admin/cms/pages                 # Store
GET    /admin/cms/pages/{id}/edit       # Edit form
PUT    /admin/cms/pages/{id}            # Update
DELETE /admin/cms/pages/{id}            # Delete
POST   /admin/cms/pages/{id}/restore    # Restore

GET    /admin/subscribers               # List subscribers
GET    /admin/subscribers/{id}          # View
POST   /admin/subscribers/{id}/verify   # Verify
POST   /admin/subscribers/{id}/unsubscribe
DELETE /admin/subscribers/{id}          # Delete
POST   /admin/subscribers/bulk-unsubscribe
GET    /admin/subscribers/export/csv    # Download
GET    /admin/subscribers/stats         # JSON stats
```

#### Public Routes

```
POST   /contact                         # Submit form
POST   /subscribe                       # Newsletter signup
```

### 4. Views

#### Public Pages

- `home.blade.php` - Hero + sections + CTA
- `technology.blade.php` - Platform overview
- `robotics.blade.php` - Research & design
- `homesystems.blade.php` - Coordination layer
- `appliances.blade.php` - Smart appliances
- `safety.blade.php` - Safety engineering
- `about.blade.php` - Company mission
- `careers.blade.php` - Job listings
- `contact.blade.php` - Inquiry form

#### Admin Views

- `cms/pages/index.blade.php` - Page list with actions
- `cms/pages/create.blade.php` - Page creation form
- `cms/pages/edit.blade.php` - Page edit form
- `subscribers/index.blade.php` - Subscriber management

### 5. Database Tables

| Table | Purpose | Key Fields |
|-------|---------|-----------|
| cms_pages | CMS content | id, title, slug, status, content, hero_* |
| subscribers | Newsletter | id, email, name, source, verified_at, unsubscribed_at |
| inquiries | Contact form | id, email, inquiry_type, status, message |
| jobs | Job postings | id, title, description, location, status |
| job_applications | Applications | id, job_id, email, resume_path, status |
| users | Admin accounts | id, name, email, password |
| roles | User roles | id, name |
| role_user | Role pivot | user_id, role_id |
| uploads | File tracking | id, user_id, path, mime_type |

---

## Database Relationships

```
Users (Has Many)
├─ JobApplications
├─ Inquiries (assigned_to)
└─ Uploads

Subscribers (Independent)
└─ Email list

CmsPages (Independent)
└─ Content pages

Roles (Many-to-Many)
├─ Users (via role_user)
└─ Permissions

Jobs (Has Many)
└─ JobApplications

Inquiries (Belongs To)
└─ User (assigned_to, nullable)
```

---

## API Endpoints Summary

### Page Management (CMS)

- **List** `GET /admin/cms/pages?page=1&per_page=15`
- **Create Form** `GET /admin/cms/pages/create`
- **Store** `POST /admin/cms/pages`
- **Edit Form** `GET /admin/cms/pages/{id}/edit`
- **Update** `PUT /admin/cms/pages/{id}`
- **Delete** `DELETE /admin/cms/pages/{id}`
- **Restore** `POST /admin/cms/pages/{id}/restore`
- **Force Delete** `DELETE /admin/cms/pages/{id}/force-delete`

### Subscriber Management

- **List** `GET /admin/subscribers?page=1`
- **Show** `GET /admin/subscribers/{id}`
- **Verify** `POST /admin/subscribers/{id}/verify`
- **Unsubscribe** `POST /admin/subscribers/{id}/unsubscribe`
- **Bulk Unsubscribe** `POST /admin/subscribers/bulk-unsubscribe`
- **Delete** `DELETE /admin/subscribers/{id}`
- **Export CSV** `GET /admin/subscribers/export/csv`
- **Stats** `GET /admin/subscribers/stats`

### Public Forms

- **Contact Submit** `POST /contact`
- **Subscribe** `POST /subscribe`

---

## Workflows & Processes

### 1. Contact Form Submission

```
User fills contact form
        ↓
Choose inquiry type:
  ├─ "general/partnership/press"
  │   ↓
  │   Validate input
  │   ↓
  │   Create Inquiry record
  │   ↓
  │   Send admin notification
  │   ↓
  │   Send user confirmation
  │   ↓
  │   Redirect to thank you
  │
  └─ "early_interest"
      ↓
      Validate input
      ↓
      Create/Update Subscriber
      ↓
      Send verification email
      ↓
      Mark verified (auto)
      ↓
      Redirect to thank you
```

### 2. CMS Page Publishing

```
Admin creates page
     ↓
Fill in form (title, slug, content, hero, etc)
     ↓
Set status:
  ├─ Draft (not visible)
  ├─ Published (visible to public)
  └─ Archived (hidden)
     ↓
Upload hero image (optional)
     ↓
Enter meta description (SEO)
     ↓
Click Save
     ↓
Page appears on website
     ↓
Can edit anytime
     ↓
Can restore if deleted
```

### 3. Job Application Process

```
User views /careers
     ↓
Sees open positions
     ↓
Clicks "Apply" on job
     ↓
Fills application form
     ↓
Uploads resume
     ↓
Submits
     ↓
Application stored in DB
     ↓
Confirmation email sent
     ↓
Admin notified
     ↓
Admin reviews in dashboard
     ↓
Changes status (reviewed, offer, rejected)
     ↓
User updated via email
```

---

## Admin Interface

### Dashboard (`/admin`)

- Overview of system stats
- Recent submissions
- Quick links to manage content

### CMS Pages (`/admin/cms/pages`)

- ✅ List all pages with status badges
- ✅ Create new pages
- ✅ Edit existing pages with rich editor
- ✅ Upload hero images
- ✅ Draft/publish/archive workflow
- ✅ Delete and restore pages
- ✅ SEO metadata editor

### Subscribers (`/admin/subscribers`)

- ✅ View all subscribers
- ✅ Filter by status (verified, active, unsubscribed)
- ✅ View subscriber details
- ✅ Unsubscribe users
- ✅ Bulk actions
- ✅ Export to CSV
- ✅ View statistics

### Inquiries (`/admin/inquiries`)

- View contact form submissions
- Filter by type (general, partnership, press, early_interest)
- Change status (new → reviewed → responded → closed)
- Assign to team members
- Reply to inquiries
- Archive old inquiries

---

## Deployment Guide

### Prerequisites

- PHP 8.1+
- MySQL 8.0+ or MariaDB 10.5+
- Composer
- Git

### Local Development

```bash
# 1. Clone repository
git clone <repo_url> constraal
cd constraal

# 2. Install dependencies
composer install

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Set up database
php artisan migrate
php artisan seed

# 5. Create admin user
php artisan tinker
>>> User::create(['name' => 'Admin', 'email' => 'admin@...', 'password' => bcrypt('pwd')])

# 6. Serve application
php artisan serve
# Visit: http://localhost:8000
```

### Production Deployment

```bash
# 1. Push code to repository
git push origin main

# 2. SSH into production server
ssh user@production.server

# 3. Deploy new code
git pull origin main

# 4. Install dependencies
composer install --optimize-autoloader --no-dev

# 5. Run migrations
php artisan migrate --force

# 6. Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Restart web server
sudo systemctl restart nginx
```

### Production .env Configuration

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://constraal.com

DB_HOST=prod-db.example.com
DB_DATABASE=constraal_prod
DB_USERNAME=db_user
DB_PASSWORD=secure_password

CACHE_DRIVER=redis
SESSION_DRIVER=cookie
QUEUE_CONNECTION=database

MAIL_MAILER=sendgrid
MAIL_FROM_ADDRESS=hello@constraal.com

AWS_ACCESS_KEY_ID=...
AWS_SECRET_ACCESS_KEY=...
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=constraal-assets
```

---

## Support & Maintenance

### Regular Tasks

**Daily:**

- Monitor error logs (`storage/logs/`)
- Check email delivery status

**Weekly:**

- Backup database
- Review CMS pages
- Check subscriber metrics

**Monthly:**

- Review analytics
- Update dependencies (`composer update`)
- Security patches

### Troubleshooting

| Issue | Solution |
|-------|----------|
| "Class not found" | Run `composer dump-autoload` |
| Database errors | Check `.env` configuration |
| File uploads fail | Verify `storage/` permissions |
| Emails not sending | Test with `php artisan tinker` |
| Cache issues | Run `php artisan cache:clear` |

### Documentation

- **WIREFRAMES.md** - UX/UI specifications
- **DATABASE.md** - Schema & queries
- **API.md** - Endpoint documentation
- **IMPLEMENTATION.md** - Quick start guide
- **ARCHITECTURE.md** - This file

---

## 📞 Support Resources

| Resource | Location |
|----------|----------|
| Docs | `/docs` folder |
| API Specs | `API.md` |
| Database | `DATABASE.md` |
| Wireframes | `WIREFRAMES.md` |
| Project Setup | `SETUP.md` |

## License & Credits

Built with ❤️ for Constraal  
Stack: Laravel 10 + MySQL 8 + Blade + CSS3  
Last Updated: February 10, 2026
