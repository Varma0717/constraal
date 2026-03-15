@extends('layouts.admin')

@section('title', 'Add Administrator')
@section('page-title', 'Add Administrator')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Administrator</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.admins.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                <small class="text-muted">Minimum 8 characters</small>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Roles <span class="text-danger">*</span></label>
                @error('roles')
                <div class="text-danger small mb-2">{{ $message }}</div>
                @enderror
                <div class="row">
                    @foreach($roles as $role)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="role_{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="role_{{ $role->id }}">
                                {{ $role->name }}
                                @if($role->description)
                                <small class="text-muted d-block">{{ $role->description }}</small>
                                @endif
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Administrator</button>
            </div>
        </form>
    </div>
</div>
@endsection