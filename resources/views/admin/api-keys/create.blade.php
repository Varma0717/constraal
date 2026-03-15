@extends('layouts.admin')

@section('title', 'Create API Key')
@section('page-title', 'Create API Key')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New API Key</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.api-keys.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Key Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., Mobile App Key" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Permissions</label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="read" id="perm_read" checked>
                            <label class="form-check-label" for="perm_read">Read</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="write" id="perm_write">
                            <label class="form-check-label" for="perm_write">Write</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="delete" id="perm_delete">
                            <label class="form-check-label" for="perm_delete">Delete</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create API Key</button>
                <a href="{{ route('admin.api-keys.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection