@extends('layouts.admin')

@section('title', 'View Message')
@section('page-title', 'View Message')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ $message->subject ?? 'Contact Message' }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <strong>Message:</strong>
                    <div class="mt-2 p-3 bg-light rounded" style="white-space: pre-wrap;">{{ $message->message }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Sender Information</h6>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $message->name }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                @if($message->phone)
                <p><strong>Phone:</strong> {{ $message->phone }}</p>
                @endif
                <p><strong>Received:</strong> {{ $message->created_at->format('M d, Y H:i') }}</p>
                <p>
                    <strong>Status:</strong>
                    @if($message->is_read)
                    <span class="badge bg-secondary">Read</span>
                    @if($message->read_at)
                    <small class="text-muted d-block mt-1">Read at {{ $message->read_at->format('M d, Y H:i') }}</small>
                    @endif
                    @else
                    <span class="badge bg-primary">Unread</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? 'Your message' }}" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-reply"></i> Reply via Email
                </a>

                @if(!$message->is_read)
                <form action="{{ route('admin.contact-messages.mark-read', $message) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary w-100 mb-2">
                        <i class="bi bi-check"></i> Mark as Read
                    </button>
                </form>
                @endif

                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-trash"></i> Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Messages
    </a>
</div>
@endsection