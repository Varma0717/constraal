@extends('layouts.admin')

@section('title', 'Edit CMS Page')
@section('page-title', 'Edit CMS Page')
@section('icon', 'bi-layout-text-window')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit CMS Page</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.cms.pages.update', $page) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $page->title) }}" required>
                @error('title')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $page->slug) }}" required>
                    @error('slug')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $page->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="published_at">Published Date</label>
                    <input type="date" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $page->published_at ? $page->published_at->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1" {{ old('featured', $page->featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">Featured Page</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="meta_description">Meta Description (SEO)</label>
                <textarea class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Brief description for search engines...">{{ old('meta_description', $page->meta_description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="meta_keywords">Meta Keywords (SEO)</label>
                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}" placeholder="keyword1, keyword2, keyword3">
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Hero Section</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="hero_title">Hero Title</label>
                        <input type="text" class="form-control" id="hero_title" name="hero_title" value="{{ old('hero_title', $page->hero_title) }}" placeholder="Main heading for hero section">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hero_description">Hero Description</label>
                        <textarea class="form-control" id="hero_description" name="hero_description" rows="4" placeholder="Subheading or description...">{{ old('hero_description', $page->hero_description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hero_image">Hero Image</label>
                        @if($page->hero_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $page->hero_image) }}" alt="Hero image" style="max-height: 160px; border-radius: 8px; border: 1px solid var(--border-color);">
                        </div>
                        @endif
                        <input type="file" class="form-control" id="hero_image" name="hero_image" accept="image/jpeg,image/png,image/webp">
                        <div class="form-text">JPEG, PNG, or WebP. Max 5MB.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="hero_cta_text">CTA Button Text</label>
                            <input type="text" class="form-control" id="hero_cta_text" name="hero_cta_text" value="{{ old('hero_cta_text', $page->hero_cta_text) }}" placeholder="e.g., Explore">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="hero_cta_url">CTA Button URL</label>
                            <input type="text" class="form-control" id="hero_cta_url" name="hero_cta_url" value="{{ old('hero_cta_url', $page->hero_cta_url) }}" placeholder="e.g., /technology">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label" for="page_content">Page Content (HTML)</label>
                <textarea class="form-control" id="page_content" name="content" rows="12" placeholder="Enter HTML content...">{{ old('content', $page->content) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.cms.pages.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
