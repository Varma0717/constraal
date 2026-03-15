@extends('layouts.admin')

@section('title', 'Navigation Management')
@section('page-title', 'Navigation Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Menu Items</h5>
        <a href="{{ route('admin.navigation.create') }}" class="btn btn-primary btn-sm">+ Add Menu Item</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{ $item->order }}</td>
                    <td>
                        @if($item->parent_id)
                        <span class="text-muted">— </span>
                        @endif
                        {{ $item->label }}
                    </td>
                    <td><code>{{ $item->url }}</code></td>
                    <td>
                        @if($item->is_visible)
                        <span class="admin-badge admin-badge--success">Visible</span>
                        @else
                        <span class="admin-badge admin-badge--muted">Hidden</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.navigation.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.navigation.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this menu item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center" class="py-4">No menu items found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items->hasPages())
    <div class="px-3 py-2 border-top">
        {{ $items->links() }}
    </div>
    @endif
</div>
@endsection