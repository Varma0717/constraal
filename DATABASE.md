# Constraal Database Schema & Implementation Guide

## Overview

This document outlines the complete database schema for the Constraal website, including all tables, relationships, and implementation instructions.

## Database Tables

### 1. Users (Existing)

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);
```

### 2. Roles (Existing)

```sql
CREATE TABLE roles (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

**Reference Roles:**

- `admin` - Full system access
- `editor` - Can create/edit content and CMS pages
- `moderator` - Can moderate comments/inquiries
- `viewer` - Read-only access

### 3. Role User (Pivot - Existing)

```sql
CREATE TABLE role_user (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    role_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_role (user_id, role_id)
);
```

### 4. CMS Pages (NEW)

```sql
CREATE TABLE cms_pages (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL INDEX,
    meta_description VARCHAR(255) NULL,
    meta_keywords VARCHAR(255) NULL,
    content LONGTEXT NULL,
    hero_title VARCHAR(255) NULL,
    hero_description TEXT NULL,
    hero_image VARCHAR(255) NULL,
    hero_cta_text VARCHAR(100) NULL,
    hero_cta_url VARCHAR(255) NULL,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft' INDEX,
    featured BOOLEAN DEFAULT FALSE INDEX,
    published_at TIMESTAMP NULL INDEX,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);
```

**Purpose:** Manage all CMS content pages independently from blade templates.

**Status Workflow:**

```
draft → published → archived
  ↓         ↓
  └─────────┘ (restore)
```

### 5. Subscribers (NEW)

```sql
CREATE TABLE subscribers (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL INDEX,
    name VARCHAR(255) NULL,
    source VARCHAR(50) DEFAULT 'website_signup' INDEX,
    verified_at TIMESTAMP NULL INDEX,
    unsubscribed_at TIMESTAMP NULL INDEX,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);
```

**Purpose:** Manage newsletter/early updates subscribers.

**Source Values:**

- `website_signup` - Opted in via /subscribe endpoint
- `contact_form` - Opted in via contact form "early_interest" option
- `import` - Manually imported by admin

**Workflow:**

```
Create → Send Verification Email → verified_at set
      ↓
      Unsubscribe → unsubscribed_at set (soft exclude)
```

### 6. Jobs (Existing)

```sql
CREATE TABLE jobs (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    employment_type VARCHAR(50),
    description LONGTEXT,
    requirements LONGTEXT,
    benefits LONGTEXT,
    salary_min DECIMAL(10, 2) NULL,
    salary_max DECIMAL(10, 2) NULL,
    currency VARCHAR(3) DEFAULT 'USD',
    remote BOOLEAN DEFAULT FALSE,
    posted_at TIMESTAMP,
    expires_at TIMESTAMP NULL,
    status VARCHAR(50) DEFAULT 'active' INDEX,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL
);
```

### 7. Job Applications (Existing)

```sql
CREATE TABLE job_applications (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    job_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL INDEX,
    phone VARCHAR(20) NULL,
    resume_path VARCHAR(255) NOT NULL,
    cover_letter LONGTEXT NULL,
    portfolio_url VARCHAR(255) NULL,
    linkedin_url VARCHAR(255) NULL,
    status VARCHAR(50) DEFAULT 'new' INDEX,
    applied_at TIMESTAMP,
    reviewed_at TIMESTAMP NULL,
    source VARCHAR(50) DEFAULT 'website',
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE
);
```

### 8. Inquiries (Existing)

```sql
CREATE TABLE inquiries (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL INDEX,
    company VARCHAR(255) NULL,
    inquiry_type VARCHAR(50) NOT NULL INDEX,
    message LONGTEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'new' INDEX,
    response_message LONGTEXT NULL,
    responded_at TIMESTAMP NULL,
    assigned_to_user_id BIGINT UNSIGNED NULL,
    priority VARCHAR(50) DEFAULT 'normal' INDEX,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (assigned_to_user_id) REFERENCES users(id) ON DELETE SET NULL
);
```

**Inquiry Types:**

- `general` - General inquiry
- `partnership` - Business partnership
- `press` - Press/media inquiry
- `early_interest` - Early updates interest

### 9. Uploads (Existing)

```sql
CREATE TABLE uploads (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    filename VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    mime_type VARCHAR(50) NOT NULL,
    size BIGINT,
    uploaded_at TIMESTAMP,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

---

## Entity Relationship Diagram

```
Users ─────┬─────── Roles (many-to-many via role_user)
           │
           ├─ has_many ─→ JobApplications
           │
           └─ has_many ─→ Inquiries (assigned_to)

Subscribers
   ├─ source = "website_signup"
   ├─ source = "contact_form"
   └─ source = "import"

CmsPages
   ├─ status: draft/published/archived
   ├─ slug: unique URL path
   └─ hero_image: storage reference

Jobs ─────────────────┐─ has_many ─→ JobApplications
(career postings)     │
                      └─ application_count: denormalized
                      
JobApplications
   ├─ belongs_to ─→ Jobs
   ├─ resume_path: storage reference
   └─ status: new/reviewed/rejected/offer
   
Inquiries
   ├─ inquiry_type: general/partnership/press/early_interest
   ├─ status: new/reviewed/responded/closed
   └─ assigned_to: nullable user_id for admin assignment
```

---

## Implementation Steps

### Step 1: Run Migrations

```bash
# Create CMS pages table
php artisan migrate --path=database/migrations/2026_02_10_000001_create_cms_pages_table.php

# Create subscribers table
php artisan migrate --path=database/migrations/2026_02_10_000002_create_subscribers_table.php

# Run all pending migrations
php artisan migrate
```

### Step 2: Seed Initial Data

Create `database/seeders/CmsPagesSeeder.php`:

```php
<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class CmsPagesSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'status' => 'published',
                'featured' => true,
                'meta_description' => 'Intelligent Robotics for the Modern Home',
                'hero_title' => 'Intelligent Robotics for the Modern Home',
                'published_at' => now(),
            ],
            [
                'title' => 'Technology',
                'slug' => 'technology',
                'status' => 'published',
                'meta_description' => 'Core Technology Platform - Embedded Systems & On-Device Intelligence',
                'hero_title' => 'Core Technology Platform',
                'published_at' => now(),
            ],
            [
                'title' => 'Robotics',
                'slug' => 'robotics',
                'status' => 'published',
                'meta_description' => 'Home Robotics Research - Built for Trust',
                'hero_title' => 'Home Robotics, Built for Trust',
                'published_at' => now(),
            ],
            // ... more pages
        ];

        foreach ($pages as $page) {
            CmsPage::firstOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
```

Run seeder:

```bash
php artisan db:seed --class=CmsPagesSeeder
```

### Step 3: Register Admin Routes

Update `routes/cms.php` to include resource routes with middleware checks:

```php
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('cms/pages', CmsPageController::class);
    Route::resource('subscribers', SubscriberController::class)->only(['index', 'show', 'destroy']);
    // ... more routes
});
```

### Step 4: Create Admin Users

```bash
php artisan tinker
>>> $user = User::create([
    'name' => 'Admin',
    'email' => 'admin@constraal.example',
    'password' => bcrypt('secure_password'),
]);
>>> $user->roles()->attach(Role::where('name', 'admin')->first());
```

### Step 5: Set Storage Permissions

```bash
# Make storage directory writable
chmod -R 755 storage/
chmod -R 755 storage/app/public/

# Create symlink for public uploads
php artisan storage:link
```

---

## Query Examples

### Get All Published Pages

```php
$pages = CmsPage::published()->get();
```

### Get Featured Pages

```php
$featured = CmsPage::where('featured', true)->published()->get();
```

### Get Page by Slug

```php
$page = CmsPage::where('slug', 'technology')->first();
```

### Get Active Subscribers

```php
$activeSubscribers = Subscriber::active()->count(); // Returns count of active subscribers

$verifiedCount = Subscriber::verified()->count();
```

### Export Subscribers to CSV

```php
$subscribers = Subscriber::active()->get();

$csv = "Name,Email,Source,Subscribed At\n";
foreach ($subscribers as $sub) {
    $csv .= "{$sub->name},{$sub->email},{$sub->source},{$sub->created_at}\n";
}

return response($csv)->header('Content-Type', 'text/csv');
```

### Get All Inquiries

```php
$inquiries = Inquiry::where('status', 'new')
    ->orderBy('created_at', 'desc')
    ->paginate(15);
```

### Get Assigned Inquiries

```php
$myInquiries = Inquiry::where('assigned_to_user_id', auth()->id())->get();
```

---

## Indexes & Performance

Generated indexes:

- `cms_pages(slug)` - UNIQUE - fast slug lookups
- `cms_pages(status)` - fast status filtering
- `cms_pages(featured)` - fast featured page retrieval
- `cms_pages(published_at)` - fast date filtering
- `subscribers(email)` - UNIQUE - duplicate prevention
- `subscribers(verified_at)` - fast verified filtering
- `subscribers(unsubscribed_at)` - fast unsubscribed filtering
- `inquiries(email)` - fast email lookups
- `inquiries(status)` - fast status filtering
- `job_applications(email)` - fast candidate lookups
- `job_applications(status)` - fast application filtering

---

## Backup & Recovery

### Full Database Backup

```bash
mysqldump -u root -p constraal > backup_$(date +%Y%m%d_%H%M%S).sql
```

### Restore from Backup

```bash
mysql -u root -p constraal < backup_20260210_100000.sql
```

### Laravel Backup

```bash
php artisan backup:run
```

---

## Data Retention & Cleanup

### Archive Old Inquiries

```bash
php artisan command:archive-old-inquiries --days=90
```

### Remove Old Soft-Deletes

```bash
php artisan command:prune-soft-deletes --days=30
```

### Clear Unsubscribed Subscribers (optional)

```php
Subscriber::whereNotNull('unsubscribed_at')
    ->where('unsubscribed_at', '<', now()->subMonths(6))
    ->forceDelete();
```

---

## Audit & Security

### Track Admin Changes

- All CMS page changes automatically logged via `updated_at`
- Subscriber actions tracked with timestamps
- Consider adding audit trail table for compliance

### Soft Deletes

- All major tables use soft deletes
- Data not permanently removed until force delete
- Allows recovery if needed

### Email Verification

- Subscribers tracked with `verified_at` timestamp
- Double opt-in can be enforced via email link
- Current design uses single opt-in (auto-verified)

---

## API Rate Limiting (Planned)

```php
// In routes/api.php
Route::middleware('throttle:60,1')->group(function () {
    Route::post('/subscribe', [ContactController::class, 'subscribe']);
    Route::post('/contact', [ContactController::class, 'submit']);
});

Route::middleware('throttle:30,1')->group(function () {
    // Admin endpoints
});
```

---

## Cache Strategies

### Cache Published Pages

```php
$pages = Cache::remember('cms:published:pages', 3600, function () {
    return CmsPage::published()->get();
});
```

### Cache Subscribers Count

```php
$count = Cache::remember('subscribers:active:count', 300, function () {
    return Subscriber::active()->count();
});
```

Clear cache on updates:

```php
Cache::forget('cms:published:pages');
Cache::tags(['cms'])->flush();
```

---

## Monitoring & Alerts

### Database Sizes

```sql
SELECT table_name, ROUND(((data_length + index_length) / 1024 / 1024), 2) AS size_mb
FROM information_schema.tables
WHERE table_schema = 'constraal'
ORDER BY size_mb DESC;
```

### Slow Queries

Enable in `.env`:

```
DB_LOG_QUERIES=true
```

View in `storage/logs/database.log`

---

## Disaster Recovery Plan

1. **Daily automated backups** to cloud storage (AWS S3)
2. **Point-in-time recovery** enabled on database
3. **Replication** to secondary database (optional)
4. **Recovery time objective (RTO):** 1 hour
5. **Recovery point objective (RPO):** 15 minutes
