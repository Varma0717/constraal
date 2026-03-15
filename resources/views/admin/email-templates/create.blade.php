@extends('layouts.admin')

@section('title', 'Create Email Template')
@section('page-title', 'Create Email Template')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Email Template</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.email-templates.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Template Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Email Subject *</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Email Body (HTML) *</label>
                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="12" required>{{ old('body') }}</textarea>
                <small class="text-muted">Use variables like @verbatim{{name}}@endverbatim, @verbatim{{email}}@endverbatim, @verbatim{{link}}@endverbatim for dynamic content</small>
                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="variables" class="form-label">Available Variables</label>
                <input type="text" class="form-control @error('variables') is-invalid @enderror" id="variables" name="variables" value="{{ old('variables') }}" placeholder="name, email, link">
                <small class="text-muted">Comma-separated list of variable names used in this template</small>
                @error('variables')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Template</button>
                <a href="{{ route('admin.email-templates.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection