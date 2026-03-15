@extends('layouts.admin')

@section('title', 'API Keys')
@section('page-title', 'API Key Management')

@section('content')
@if(session('api_key'))
<div class="alert alert-success">
    <strong>API Key Created!</strong>
    <span> Make sure to copy your API key now. You won't be able to see it again!</span>
    <div style="margin-top:0.75rem;">
        <code class="d-block p-2 bg-light rounded border mt-2" style="word-break:break-all; user-select:all;">{{ session('api_key') }}</code>
    </div>
</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">API Keys</h5>
        <a href="{{ route('admin.api-keys.create') }}" class="btn btn-primary btn-sm">+ Create API Key</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Status</th>
                    <th>Last Used</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($apiKeys as $key)
                <tr>
                    <td>{{ $key->id }}</td>
                    <td>{{ $key->name }}</td>
                    <td>
                        @php
                        $perms = is_array($key->permissions) ? $key->permissions : (json_decode($key->permissions, true) ?? []);
                        @endphp
                        @foreach($perms as $perm)
                        <span class="admin-badge" style="margin-right:0.25rem;">{{ ucfirst($perm) }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($key->is_active)
                        <span class="admin-badge admin-badge--success">Active</span>
                        @else
                        <span class="admin-badge admin-badge--danger">Revoked</span>
                        @endif
                    </td>
                    <td>
                        @if($key->last_used_at)
                        {{ $key->last_used_at->format('M d, Y') }}
                        @else
                        <span class="text-muted">Never</span>
                        @endif
                    </td>
                    <td>{{ $key->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.api-keys.edit', $key) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        @if($key->is_active)
                        <form action="{{ route('admin.api-keys.revoke', $key) }}" method="POST" class="d-inline" onsubmit="return confirm('Revoke this API key?')">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-info">Revoke</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.api-keys.destroy', $key) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this API key permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center" class="py-4">No API keys found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($apiKeys->hasPages())
    <div class="px-3 py-2 border-top">
        {{ $apiKeys->links() }}
    </div>
    @endif
</div>
@endsection