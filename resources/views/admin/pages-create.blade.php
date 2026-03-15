@extends('layouts.admin')

@section('title', 'Create Page')
@section('page-title', 'Create Page')
@section('icon', 'bi-file-earmark')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">New Page</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                @error('slug')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="8">{{ old('content') }}</textarea>
                @error('content')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="meta">Meta (JSON)</label>
                <textarea class="form-control" id="meta" name="meta" rows="4" placeholder='{"description":"..."}'>{{ old('meta') }}</textarea>
                @error('meta')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Page</button>
                <a href="{{ route('admin.pages') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
