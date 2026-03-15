# Constraal Website - Quick Reference Card

## 🚀 Quick Start (5 Minutes)

```bash
# 1. Create admin user
php artisan tinker
>>> User::create(['name' => 'Admin', 'email' => 'admin@ex.com', 'password' => bcrypt('pass')])

# 2. Run migrations
php artisan migrate

# 3. Visit admin
http://localhost/constraal/admin

# 4. Create first CMS page
- Click "CMS Pages"
- Click "+ Add New Page"
- Fill form & Save
```

---

## 📚 Documentation Map

| Need | File | Purpose |
|------|------|---------|
| See all page layouts | `WIREFRAMES.md` | UX for every page + admin |
| Understand database | `DATABASE.md` | Schema, tables, queries |
| API reference | `API.md` | All 54 endpoints |
| Getting started | `IMPLEMENTATION.md` | Setup & troubleshooting |
| System overview | `ARCHITECTURE.md` | Complete architecture |
| **You are here** | `QUICK_REFERENCE.md` | This card |

---

## 🗂️ File Locations

### Admin Views

```
resources/views/admin/cms/pages/index.blade.php      # List pages
resources/views/admin/cms/pages/create.blade.php     # Create form
resources/views/admin/cms/pages/edit.blade.php       # Edit form
```

### Models

```
app/Models/CmsPage.php              # CMS pages model
app/Models/Subscriber.php           # Subscribers model
app/Models/Inquiry.php              # Contact inquiries
app/Models/Job.php                  # Job postings
app/Models/JobApplication.php       # Applications
```

### Controllers

```
app/Http/Controllers/ContactController.php                    # Forms
app/Http/Controllers/Admin/CmsPageController.php             # Pages
app/Http/Controllers/Admin/SubscriberController.php          # Subscribers
```

### Database

```
database/migrations/2026_02_10_000001...cms_pages            # CMS table migration
database/migrations/2026_02_10_000002...subscribers          # Subscribers migration
```

### Routes

```
routes/web.php      # Main routes (updated with /subscribe)
routes/cms.php      # Admin CMS routes (new)
```

---

## 🔗 Key URLs

| Page | URL | Purpose |
|------|-----|---------|
| Homepage | `/` | Public landing |
| Technology | `/technology` | Platform overview |
| Robotics | `/robotics` | Research focus |
| Home Systems | `/home-systems` | Coordination layer |
| Appliances | `/appliances` | Smart appliances |
| Safety | `/safety` | Safety engineering |
| About | `/about` | Company mission |
| Careers | `/careers` | Job listings |
| Contact | `/contact` | Inquiry form |
| **Admin** | **/admin** | Dashboard |
| Pages/CMS | `/admin/cms/pages` | Manage pages |
| Subscribers | `/admin/subscribers` | Email subscribers |
| Inquiries | `/admin/inquiries` | Contact submissions |

---

## 🛠️ Common Commands

```bash
# Run migrations
php artisan migrate

# Create admin user
php artisan tinker
>>> User::create(['name' => 'Admin', ...])

# Clear caches
php artisan cache:clear
php artisan config:cache
php artisan route:cache

# Database backup
mysqldump -u root -p constraal > backup.sql

# Create new page programmatically
php artisan tinker
>>> CmsPage::create(['title' => '...', 'slug' => '...', ...])

# Get subscriber count
php artisan tinker
>>> Subscriber::active()->count()

# Export subscribers
php artisan tinker
>>> Subscriber::verified()->get()->map(fn($s) => [$s->name, $s->email])
```

---

## 📊 Database Tables Quick View

| Table | Purpose | Key Fields |
|-------|---------|-----------|
| `cms_pages` | Website content | id, title, slug, status, content |
| `subscribers` | Email list | id, email, verified_at, unsubscribed_at |
| `inquiries` | Contact submissions | id, email, inquiry_type, message, status |
| `jobs` | Job postings | id, title, description, location |
| `job_applications` | Applicants | id, job_id, email, resume_path, status |
| `users` | Admin accounts | id, email, password |
| `roles` | User roles | id, name |

---

## 🔐 Authentication

### Admin Access

```
URL: /admin
Email: admin@example.com
Password: (what you set)
```

### Reset Admin Password

```bash
php artisan tinker
>>> $user = User::where('email', 'admin@ex.com')->first()
>>> $user->update(['password' => bcrypt('newpassword')])
>>> exit
```

---

## 📧 Email Configuration

In `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=hello@constraal.example
```

### Test Email

```bash
php artisan tinker
>>> Mail::raw('Test', function($m) { $m->to('test@ex.com'); })
>>> exit
```

---

## 🎨 CSS Classes

### Layout

```html
<div class="site-container">           <!-- Max width, responsive padding -->
<section class="page-hero">            <!-- Gradient hero section -->
<section class="section-muted">        <!-- Light gray background -->
<div class="cta-band">                 <!-- Blue CTA section -->
```

### Grid

```html
<div class="grid grid-cols-1 md:grid-cols-2">   <!-- 1 col mobile, 2 desktop -->
<div class="grid grid-cols-1 md:grid-cols-3">   <!-- 1 col mobile, 3 desktop -->
<div class="grid grid-cols-1 md:grid-cols-4">   <!-- 1 col mobile, 4 desktop -->
```

### Components

```html
<div class="section-card">             <!-- Elevated card with shadow -->
<button class="btn">                   <!-- Primary blue button -->
<button class="btn-secondary">         <!-- Secondary button -->
```

---

## 💾 Backup Strategy

### Manual Backup

```bash
# Database only
mysqldump -u root -p constraal > backup_$(date +%s).sql

# Full backup (including uploads)
tar -czf constraal_backup_$(date +%s).tar.gz app/ resources/ database/ storage/app/

# Restore database
mysql -u root -p constraal < backup_timestamp.sql
```

### Restore from Backup

```bash
# Restore database
mysql -u root -p constraal < backup.sql

# Restore files
tar -xzf backup.tar.gz
```

---

## 🐛 Debugging Tips

### Enable Debug Mode

In `.env`:

```
APP_DEBUG=true
```

### View Logs

```bash
tail -f storage/logs/laravel.log
```

### Database Queries

In `.env`:

```
DB_LOG_QUERIES=true
```

View in: `storage/logs/database.log`

### Test Database Connection

```bash
php artisan tinker
>>> DB::connection()->getPdo()
>>> exit
```

---

## ✅ Checklist for First Run

- [ ] Run `php artisan migrate`
- [ ] Create admin user with `php artisan tinker`
- [ ] Login to `/admin`
- [ ] Create first CMS page
- [ ] Test contact form submission
- [ ] Verify email configuration
- [ ] Create sample job posting
- [ ] Test job application
- [ ] Check responsive design on mobile

---

## 📞 Support

| Issue | Solution |
|-------|----------|
| 404 errors | Check routes/web.php includes routes/cms.php |
| Blank admin page | Run `php artisan cache:clear` |
| Image upload fails | Verify `storage/` permissions & public/storage symlink |
| DB connection error | Check `.env` DB_* variables |
| Email not sending | Verify MAIL_* config & SMTP credentials |
| Page doesn't appear | Check status is "published" not "draft" |

---

## 🎯 Next Steps

1. **Setup Database** - `php artisan migrate`
2. **Create Admin** - Use tinker command
3. **Login** - Go to `/admin`
4. **Add Content** - Create pages via CMS
5. **Test Forms** - Submit contact/job application
6. **Deploy** - Push to production server

---

## 📖 Full Documentation

For detailed information, see:

- **WIREFRAMES.md** - Complete UX/UI specifications
- **DATABASE.md** - All tables, relationships, queries
- **API.md** - Complete endpoint documentation
- **ARCHITECTURE.md** - System design & overview
- **IMPLEMENTATION.md** - Setup & troubleshooting

---

**Last Updated:** February 10, 2026  
**Version:** 1.0  
**Status:** ✅ Production Ready
