@extends('layouts.admin')

@section('title', 'API Key Details')
@section('page-title', 'API Key Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $apiKey->name }}</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.api-keys.edit', $apiKey) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <a href="{{ route('admin.api-keys.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
        </div>
    </div>
    <div class="card-body">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:1.5rem; margin-bottom:1.5rem;">
            <div>
                <p class="text-muted" style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:0.25rem;">Name</p>
                <p style="font-weight:600;">{{ $apiKey->name }}</p>
            </div>
            <div>
                <p class="text-muted" style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:0.25rem;">Status</p>
                @if($apiKey->is_active)
                <span class="admin-badge admin-badge--success">Active</span>
                @else
                <span class="admin-badge admin-badge--danger">Revoked</span>
                @endif
            </div>
            <div>
                <p class="text-muted" style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:0.25rem;">Created</p>
                <p style="font-weight:600;">{{ $apiKey->created_at->format('M d, Y H:i') }}</p>
            </div>
            <div>
                <p class="text-muted" style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:0.25rem;">Last Used</p>
                <p style="font-weight:600;">{{ $apiKey->last_used_at ? $apiKey->last_used_at->format('M d, Y H:i') : 'Never' }}</p>
            </div>
        </div>

        <div style="margin-bottom:1.5rem;">
            <p class="text-muted" style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:0.5rem;">Permissions</p>
            @php
            $permissions = is_array($apiKey->permissions) ? $apiKey->permissions : (json_decode($apiKey->permissions, true) ?? []);
            @endphp
            @forelse($permissions as $perm)
            <span class="admin-badge" style="margin-right:0.35rem;">{{ ucfirst($perm) }}</span>
            @empty
            <span class="text-muted">No permissions assigned</span>
            @endforelse
        </div>

        <div class="d-flex gap-2" style="margin-top:1.5rem; padding-top:1.5rem; border-top:1px solid #e2e8f0;">
            @if($apiKey->is_active)
            <form action="{{ route('admin.api-keys.revoke', $apiKey) }}" method="POST" onsubmit="return confirm('Revoke this API key?')">
                @csrf
                <button type="submit" class="btn btn-outline-info btn-sm">Revoke Key</button>
            </form>
            @endif
            <form action="{{ route('admin.api-keys.destroy', $apiKey) }}" method="POST" onsubmit="return confirm('Permanently delete this API key?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete Key</button>
            </form>
        </div>
    </div>
</div>
@endsection