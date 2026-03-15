@extends('layouts.admin')

@section('title', 'Edit API Key')
@section('page-title', 'Edit API Key')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit API Key</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.api-keys.update', $apiKey) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Key Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $apiKey->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @php
            $permissions = is_array($apiKey->permissions) ? $apiKey->permissions : (json_decode($apiKey->permissions, true) ?? []);
            @endphp

            <div class="mb-3">
                <label class="form-label">Permissions</label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="read" id="perm_read" {{ in_array('read', $permissions) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm_read">Read</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="write" id="perm_write" {{ in_array('write', $permissions) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm_write">Write</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="delete" id="perm_delete" {{ in_array('delete', $permissions) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm_delete">Delete</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $apiKey->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update API Key</button>
                <a href="{{ route('admin.api-keys.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection