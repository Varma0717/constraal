# Modern Component Usage Guide

This document explains how to use the new Blade components following Tencent Cloud's design layout and Samsung's category organization.

## Components Created

### 1. Modern Header (`header-modern.blade.php`)

**Location**: `resources/views/partials/header-modern.blade.php`

A sophisticated navigation header with mega-menu support inspired by Tencent Cloud and Samsung.

**Features**:

- Sticky navigation with brand logo
- Desktop mega-menu with 4-column layout
- Mobile-responsive navigation drawer
- Featured highlights section
- Call-to-action button

**Usage**:
Replace the existing header in your layout:

```blade
<!-- In resources/views/layouts/app.blade.php -->
@include('partials.header-modern')  <!-- Instead of header -->
```

---

### 2. Product Card (`product-card.blade.php`)

**Location**: `resources/views/components/product-card.blade.php`

Modern product showcase card with hover effects and features list.

**Usage**:

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <x-product-card 
        title="AI Platform"
        category="Artificial Intelligence"
        description="Intelligent automation and predictive analytics"
        image="{{ asset('images/ai-platform.png') }}"
        link="{{ route('technology') }}"
        :features="['Human-aware', 'Scalable', '24/7 Support']"
    />
</div>
```

**Optional Parameters**:

- `title` - Product name
- `category` - Category badge
- `description` - Product description
- `image` - Product image URL
- `link` - Navigation link
- `features` - Array of feature strings

---

### 3. Category Section (`category-section.blade.php`)

**Location**: `resources/views/components/category-section.blade.php`

Full-width section component for organizing products by category (Samsung-style).

**Usage**:

```blade
<x-category-section 
    title="Complete Smart Home Ecosystem"
    subtitle="Explore our comprehensive suite of products"
    badge="Our Solutions"
    columns="4"
    showMore="true"
    moreLink="{{ route('products') }}"
>
    <!-- Product cards go here -->
    <x-product-card ... />
    <x-product-card ... />
</x-category-section>
```

**Parameters**:

- `title` - Section heading
- `subtitle` - Section description
- `badge` - Category badge
- `columns` - Number of grid columns (default: 3)
- `showMore` - Show "View All" button
- `moreLink` - Link for "View All" button
- `slot` - Content inside (product cards)

---

### 4. Feature Showcase (`feature-showcase.blade.php`)

**Location**: `resources/views/components/feature-showcase.blade.php`

Section component for highlighting major features with alternating layout.

**Usage**:

```blade
<x-feature-showcase 
    title="Intelligent Living Environments"
    subtitle="Homes are becoming responsive environments"
    badge="The Future of Home"
>
    <x-feature-item 
        heading="Advanced Robotics"
        description="Robots designed for modern homes"
        image="{{ asset('images/robotics.png') }}"
        imagePosition="right"
        ctaText="Learn More"
        ctaLink="{{ route('robotics') }}"
        :features="[
            'Human-aware design',
            'Safe around people and pets',
            'Seamless integration'
        ]"
    />
</x-feature-showcase>
```

---

### 5. Feature Item (`feature-item.blade.php`)

**Location**: `resources/views/components/feature-item.blade.php`

Individual feature row with image and details (used within feature-showcase).

**Parameters**:

- `heading` - Feature heading
- `description` - Feature description
- `image` - Feature image URL
- `imagePosition` - "left" or "right"
- `features` - Array of bullet points
- `ctaText` - Call-to-action button text
- `ctaLink` - Call-to-action button URL

---

### 6. Testimonial Section (`testimonial-section.blade.php`)

**Location**: `resources/views/components/testimonial-section.blade.php`

Container for displaying customer testimonials or social proof.

**Usage**:

```blade
<x-testimonial-section 
    title="What Our Customers Say"
    subtitle="Over 10,000 satisfied users worldwide"
    badge="Success Stories"
>
    <x-testimonial-card 
        quote="This platform transformed our home automation setup"
        rating="5"
        author="John Smith"
        authorRole="Homeowner"
        authorImage="{{ asset('images/avatar1.jpg') }}"
    />
</x-testimonial-section>
```

---

### 7. Testimonial Card (`testimonial-card.blade.php`)

**Location**: `resources/views/components/testimonial-card.blade.php`

Individual testimonial card with star rating and author details.

**Parameters**:

- `quote` - Testimonial text
- `rating` - Star rating (1-5)
- `author` - Author name
- `authorRole` - Author title/role
- `authorImage` - Author image URL (optional, generates avatar if not provided)

---

## Design Patterns Used

### Tencent Cloud Inspiration

- **Mega Menu Design**: 4-column organized navigation with featured highlights
- **Color Palette**: Professional blue (#0066CC) with clean whites and grays
- **Typography**: Clear hierarchy with bold headings and readable body text
- **Spacing**: Generous padding and whitespace for premium feel

### Samsung Inspiration

- **Product Cards**: Clean, organized product showcase with descriptions
- **Category Organization**: Clear separation of product lines
- **Feature Highlights**: Visual emphasis on key product benefits
- **Responsive Grid**: Flexible layouts that work on all devices

---

## Color System

```
Primary Blue: #0066CC (#2563EB in Tailwind)
Success Green: #22C55E
Warning Orange: #F97316
Error Red: #EF4444
Neutral Grays: #F8FAFC, #E2E8F0, #94A3B8, #475569, #1E293B
```

---

## Usage Example

Here's a complete example integrating all components on a page:

```blade
@extends('layouts.app')

@section('title', 'Products')

@section('page_header')
<div class="page-hero bg-gradient-to-b from-blue-50 to-white">
    <div class="site-container py-16 text-center">
        <h1 class="text-4xl font-bold text-slate-900">Our Products</h1>
        <p class="text-xl text-slate-600 mt-4">Comprehensive solutions for modern homes</p>
    </div>
</div>
@endsection

@section('content')

<!-- Products Section -->
<x-category-section 
    title="Complete Ecosystem"
    subtitle="All products in one platform"
    badge="Solutions"
    columns="4"
>
    <x-product-card 
        title="AI Platform"
        category="Technology"
        description="Intelligent automation"
        image="{{ asset('images/ai.png') }}"
        link="{{ route('technology') }}"
        :features="['Predictive', 'Scalable']"
    />
    <!-- More cards -->
</x-category-section>

<!-- Features Section -->
<x-feature-showcase title="Why Choose Us">
    <x-feature-item 
        heading="Enterprise Ready"
        description="Built for scale"
        features="['Reliable', 'Secure', '99.9% Uptime']"
        image="{{ asset('images/enterprise.png') }}"
        imagePosition="right"
        ctaText="Learn More"
        ctaLink="#"
    />
</x-feature-showcase>

<!-- Testimonials -->
<x-testimonial-section 
    title="Customer Success"
    subtitle="Join thousands of happy customers"
>
    <x-testimonial-card 
        quote="Transformed our home!"
        rating="5"
        author="Jane Doe"
        authorRole="Homeowner"
    />
</x-testimonial-section>

@endsection
```

---

## CSS Classes Reference

All components use **Tailwind CSS**. Key utility classes:

- **Spacing**: `py-16` (padding-y), `mb-12` (margin-bottom), `gap-8` (grid gap)
- **Colors**: `bg-blue-600`, `text-slate-900`, `border-slate-200`
- **Typography**: `text-4xl font-bold`, `text-sm`
- **Hover Effects**: `hover:bg-blue-700`, `hover:shadow-lg`, `transition-colors`
- **Responsive**: `md:`, `lg:`, `hidden md:flex` for mobile-first design

---

## Customization Tips

1. **Colors**: Update Tailwind colors in `tailwind.config.js`
2. **Spacing**: Adjust sizes using Tailwind spacing scale (4px = 1 unit)
3. **Fonts**: Configure in `tailwind.config.js` under `extend.fontFamily`
4. **Responsive**: Use `md:` and `lg:` prefixes for breakpoints

---

## Integration Notes

- All components are **reusable** and **composable**
- Use with existing Constraal routes (`route()` helper)
- Compatible with Laravel Blade templating
- Mobile-first, responsive design included
- Built with Tailwind CSS utility classes

For questions or modifications, refer to individual component files in `resources/views/components/`.
