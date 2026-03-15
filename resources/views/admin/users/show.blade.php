@extends('layouts.admin')

@section('title', 'User Details')
@section('page-title', $user->name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="mb-0">User Information</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <p class="form-control-plaintext"><strong>{{ $user->name }}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <p class="form-control-plaintext"><strong>{{ $user->email }}</strong></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Account Status</label>
                        <p class="form-control-plaintext">
                            @if ($user->email_verified_at)
                            <span class="badge bg-success">Verified</span>
                            @else
                            <span class="badge bg-warning">Unverified</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Created</label>
                        <p class="form-control-plaintext">{{ $user->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection