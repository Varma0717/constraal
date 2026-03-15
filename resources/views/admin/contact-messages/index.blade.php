@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0 d-inline">All Messages</h5>
            @if($unreadCount > 0)
            <span class="badge bg-danger ms-2">{{ $unreadCount }} unread</span>
            @endif
        </div>
        @if($unreadCount > 0)
        <form action="{{ route('admin.contact-messages.mark-all-read') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-primary">Mark All as Read</button>
        </form>
        @endif
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                    <tr @if(!$message->is_read) style="background: #f8f9fa; font-weight: 500;" @endif>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ Str::limit($message->subject ?? 'No Subject', 30) }}</td>
                        <td>
                            @if($message->is_read)
                            <span class="badge bg-secondary">Read</span>
                            @else
                            <span class="badge bg-primary">Unread</span>
                            @endif
                        </td>
                        <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No messages found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($messages->hasPages())
    <div class="card-footer">
        {{ $messages->links() }}
    </div>
    @endif
</div>
@endsection