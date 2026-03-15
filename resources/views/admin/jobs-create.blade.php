@extends('layouts.admin')

@section('title', 'Create Job')
@section('page-title', 'Create Job')
@section('icon', 'bi-briefcase')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">New Job Listing</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.jobs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                    @error('location')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}">
                    @error('category')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
                    @error('type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="8">{{ old('description') }}</textarea>
                @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4 d-flex gap-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remote" name="remote" value="1" {{ old('remote') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remote">Remote role</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Job</button>
                <a href="{{ route('admin.jobs') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
