# Constraal CMS & Backend API Documentation

## Base URL

```
http://localhost/constraal
```

---

## Authentication

All admin endpoints require authentication via Laravel session cookies. Authentication is handled via:

- Login: `POST /login`
- Logout: `POST /logout`
- Sessions stored in database

### Admin Middleware

Endpoints marked with `[ADMIN]` require:

- Authenticated user
- `admin` middleware verifying user role

---

## Public Endpoints

### Contact & Inquiries

#### Submit Contact Form

**Endpoint:** `POST /contact`
**Auth:** None

**Request Body:**

```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "company": "Acme Corp",
  "inquiry_type": "partnership|general|press|early_interest",
  "message": "I would like to...",
  "hp_name": "" // honeypot field (must be empty)
}
```

**Response (Success):**

```
302 Redirect to /contact with session message:
"Thank you — we received your message."
```

**Response (Early Interest):**
User is added to subscribers table and confirmation email sent.

```
302 Redirect to /contact
"Thank you for your interest! Check your email to confirm."
```

**Validation:**

- `name`: required, string
- `email`: required, valid email
- `company`: optional, string
- `inquiry_type`: required, one of (partnership|general|press|early_interest)
- `message`: required, string, max 5000 chars
- `hp_name`: spam honeypot (must be empty)

---

#### Subscribe to Early Updates

**Endpoint:** `POST /subscribe`
**Auth:** None

**Request Body:**

```json
{
  "email": "user@example.com",
  "name": "John Doe" // optional
}
```

**Response (Success):**

```
302 Redirect back with session message:
"Successfully subscribed! Check your email."
```

**Validation:**

- `email`: required, valid email
- `name`: optional, string, max 255

**Side Effects:**

- Creates or updates Subscriber record with source='website_signup'
- Sends confirmation email to subscriber
- No verification email link required (auto-verified on signup)

---

## Admin Endpoints

### CMS Pages Management

#### List All Pages

**Endpoint:** `GET /admin/cms/pages` [ADMIN]

**Response:**

```json
{
  "data": [
    {
      "id": 1,
      "title": "Home",
      "slug": "home",
      "status": "published",
      "featured": true,
      "published_at": "2026-02-10T10:00:00Z",
      "created_at": "2026-02-10T09:00:00Z",
      "updated_at": "2026-02-10T10:00:00Z"
    }
  ],
  "links": { "first": "...", "last": "...", "prev": null, "next": "..." },
  "meta": { "current_page": 1, "last_page": 5, "total": 67 }
}
```

**Query Parameters:**

- `page`: pagination number (default: 1)
- `per_page`: items per page (default: 15, max: 100)

---

#### Create New Page

**Endpoint:** `POST /admin/cms/pages` [ADMIN]

**Request Body (Multipart Form-Data):**

```
title: "Technology Platform"
slug: "technology"
meta_description: "Our core technology platform...",
meta_keywords: "embedded, robotics, ai",
content: "<h2>Embedded Systems...</h2>",
hero_title: "Core Technology",
hero_description: "The foundation of intelligent homes",
hero_image: [File] (image/jpeg|image/png|image/webp, max 5MB),
hero_cta_text: "Explore",
hero_cta_url: "/technology",
status: "published|draft|archived",
featured: true|false,
published_at: "2026-02-10" // required if status=published
```

**Response (Success):**

```
302 Redirect to /admin/cms/pages/{id}/edit
Session message: "Page created successfully"
```

**Response (Validation Error):**

```json
422 Unprocessable Entity
{
  "message": "The given data was invalid.",
  "errors": {
    "title": ["The title field is required."],
    "slug": ["The slug has already been taken."]
  }
}
```

---

#### Edit Page

**Endpoint:** `GET /admin/cms/pages/{id}/edit` [ADMIN]

**Response:**

```html
<!-- Form pre-populated with page data -->
```

---

#### Update Page

**Endpoint:** `PUT /admin/cms/pages/{id}` [ADMIN]

**Request Body:** (same as create, all fields optional except status)

**Response (Success):**

```
302 Redirect to /admin/cms/pages/{id}/edit
Session message: "Page updated successfully"
```

---

#### Delete Page (Soft Delete)

**Endpoint:** `DELETE /admin/cms/pages/{id}` [ADMIN]

**Response:**

```
302 Redirect to /admin/cms/pages
Session message: "Page deleted successfully"
```

---

#### Restore Soft-Deleted Page

**Endpoint:** `POST /admin/cms/pages/{id}/restore` [ADMIN]

**Response:**

```
302 Redirect to /admin/cms/pages
Session message: "Page restored successfully"
```

---

#### Force Delete Page (Permanent)

**Endpoint:** `DELETE /admin/cms/pages/{id}/force-delete` [ADMIN]

**Response:**

```
302 Redirect to /admin/cms/pages
Session message: "Page permanently deleted"
```

---

### Subscriber Management

#### List Subscribers

**Endpoint:** `GET /admin/subscribers` [ADMIN]

**Response:**

```json
{
  "data": [
    {
      "id": 1,
      "email": "john@example.com",
      "name": "John Doe",
      "source": "website_signup|contact_form",
      "verified_at": "2026-02-10T10:00:00Z",
      "unsubscribed_at": null,
      "created_at": "2026-02-10T09:00:00Z",
      "updated_at": "2026-02-10T10:00:00Z"
    }
  ],
  "links": { "first": "...", "last": "...", "prev": null, "next": "..." },
  "meta": { "current_page": 1, "last_page": 10, "total": 150 }
}
```

---

#### View Subscriber Details

**Endpoint:** `GET /admin/subscribers/{id}` [ADMIN]

**Response:**

```json
{
  "id": 1,
  "email": "john@example.com",
  "name": "John Doe",
  "source": "website_signup",
  "verified_at": "2026-02-10T10:00:00Z",
  "unsubscribed_at": null,
  "created_at": "2026-02-10T09:00:00Z",
  "updated_at": "2026-02-10T10:00:00Z"
}
```

---

#### Mark Subscriber as Verified

**Endpoint:** `POST /admin/subscribers/{id}/verify` [ADMIN]

**Response:**

```
302 Redirect back
Session message: "Subscriber verified"
```

---

#### Unsubscribe Single Subscriber

**Endpoint:** `POST /admin/subscribers/{id}/unsubscribe` [ADMIN]

**Response:**

```
302 Redirect back
Session message: "Subscriber unsubscribed"
```

---

#### Bulk Unsubscribe

**Endpoint:** `POST /admin/subscribers/bulk-unsubscribe` [ADMIN]

**Request Body:**

```json
{
  "subscriber_ids": [1, 2, 3, 4]
}
```

**Response:**

```
302 Redirect back
Session message: "4 subscribers unsubscribed"
```

---

#### Delete Subscriber

**Endpoint:** `DELETE /admin/subscribers/{id}` [ADMIN]

**Response:**

```
302 Redirect back
Session message: "Subscriber deleted"
```

---

#### Export Subscribers (CSV)

**Endpoint:** `GET /admin/subscribers/export/csv` [ADMIN]

**Response:**
CSV file download with columns:

- Name
- Email
- Source
- Subscribed At
- Verified At

**Content-Type:** `text/csv`
**Content-Disposition:** `attachment; filename=subscribers_YYYY_MM_DD_HHMMSS.csv`

---

#### Get Subscriber Statistics

**Endpoint:** `GET /admin/subscribers/stats` [ADMIN]

**Response:**

```json
{
  "total": 150,
  "active": 142,
  "verified": 140,
  "unsubscribed": 8
}
```

---

## Data Models

### CmsPage

```
{
  id: integer (primary key)
  title: string (255)
  slug: string (255, unique, indexed)
  meta_description: string (255, nullable)
  meta_keywords: string (255, nullable)
  content: longText (nullable)
  hero_title: string (255, nullable)
  hero_description: text (nullable)
  hero_image: string (255, nullable) - storage path
  hero_cta_text: string (100, nullable)
  hero_cta_url: string (255, nullable)
  status: enum ['draft', 'published', 'archived'] (indexed)
  featured: boolean (default: false, indexed)
  published_at: timestamp (nullable, indexed)
  created_at: timestamp
  updated_at: timestamp
  deleted_at: timestamp (soft deletes, nullable)
}
```

**Relationships:**

- None currently

**Scopes:**

- `published()` - Returns pages with status='published' and published_at not null
- `drafts()` - Returns pages with status='draft'
- `active()` - Returns pages not soft-deleted

---

### Subscriber

```
{
  id: integer (primary key)
  email: string (255, unique, indexed)
  name: string (255, nullable)
  source: string ['website_signup', 'contact_form'] (default: 'website_signup', indexed)
  verified_at: timestamp (nullable, indexed)
  unsubscribed_at: timestamp (nullable, indexed)
  created_at: timestamp
  updated_at: timestamp
  deleted_at: timestamp (soft deletes, nullable)
}
```

**Methods:**

- `verify()` - Sets verified_at to current time
- `unsubscribe()` - Sets unsubscribed_at to current time

**Scopes:**

- `active()` - Returns subscribers with unsubscribed_at = null
- `verified()` - Returns subscribers with verified_at not null

---

### Inquiry

```
{
  id: integer (primary key)
  name: string (255)
  email: string (255, indexed)
  company: string (255, nullable)
  inquiry_type: enum ['general', 'partnership', 'press', 'early_interest']
  message: text
  status: enum ['new', 'reviewed', 'responded', 'closed'] (default: 'new', indexed)
  created_at: timestamp
  updated_at: timestamp
}
```

---

## HTTP Status Codes

- `200 OK` - Successful GET request
- `201 Created` - Successful resource creation
- `302 Found` - Redirect (form submission success)
- `422 Unprocessable Entity` - Validation errors
- `404 Not Found` - Resource not found
- `401 Unauthorized` - Not authenticated
- `403 Forbidden` - Not authorized (insufficient permissions)
- `500 Internal Server Error` - Server error

---

## Error Handling

### Validation Errors

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "field_name": ["Error message"],
    "another_field": ["Error message 1", "Error message 2"]
  }
}
```

### Authentication Errors

```json
{
  "message": "Unauthenticated"
}
```

---

## Rate Limiting

Currently no rate limiting is enforced. For production:

- Consider implementing throttle middleware
- Suggested: 60 requests per minute for authenticated users
- Suggested: 30 requests per minute for public endpoints

---

## Webhooks & Events

Planned features (not yet implemented):

- Event notifications when inquiry submitted
- Event notifications when subscriber joins
- Bulk email sending system

---

## Usage Examples

### Create a CMS Page (cURL)

```bash
curl -X POST http://localhost/constraal/admin/cms/pages \
  -H "Cookie: XSRF-TOKEN=...; laravel_session=..." \
  -F "title=New Technology" \
  -F "slug=new-technology" \
  -F "status=published" \
  -F "content=<h2>Content here</h2>" \
  -F "hero_image=@path/to/image.jpg"
```

### Submit Contact Form (JavaScript)

```javascript
const form = new FormData();
form.append('name', 'John');
form.append('email', 'john@example.com');
form.append('inquiry_type', 'partnership');
form.append('message', 'Let\'s work together...');

fetch('/contact', {
  method: 'POST',
  body: form
})
.then(response => response.redirect ? window.location = response.url : response)
.catch(error => console.error('Error:', error));
```

### Subscribe to Updates (JavaScript)

```javascript
fetch('/subscribe', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
  },
  body: JSON.stringify({
    email: 'user@example.com',
    name: 'User Name'
  })
})
.then(res => res.json())
.then(data => console.log(data.message));
```

---

## Database Migrations

Run migrations to create all tables:

```bash
php artisan migrate
```

Migration files:

- `database/migrations/2026_02_03_*` - Original tables (pages, jobs, users, etc)
- `database/migrations/2026_02_10_000001_create_cms_pages_table.php` - CMS pages
- `database/migrations/2026_02_10_000002_create_subscribers_table.php` - Newsletter subscribers

To rollback:

```bash
php artisan migrate:rollback
```

---

## Admin Dashboard Features

### Pages Management

- Create/edit/delete pages
- Publish/draft/archive statuses
- Hero image management
- Rich text content editing
- SEO metadata
- Bulk operations

### Subscriber Management

- View all subscribers
- Filter by status (verified, active, unsubscribed)
- Export to CSV
- Bulk actions
- Send announcements (future feature)
- Automatic email confirmations

### Inquiry Management

- View contact form submissions
- Filter by type (general, partnership, press, early_interest)
- Change status (new → reviewed → responded → closed)
- Email notifications
- Archive old inquiries

---

## Future Enhancements

1. **CMS Media Library**
   - Upload/manage images and assets
   - Image optimization and CDN integration

2. **Email Campaign System**
   - Send bulk emails to subscribers
   - Track open rates and clicks
   - Template management

3. **Analytics**
   - Page view tracking
   - Form submission analytics
   - Subscriber engagement metrics

4. **Content Scheduling**
   - Schedule page publication
   - Automatic publish/unpublish at specified times

5. **Content Versioning**
   - Track page history
   - Restore previous versions
   - Revision comments

6. **Permissions & Roles**
   - Admin, Editor, Viewer roles
   - Page-level permissions
   - Activity logging
