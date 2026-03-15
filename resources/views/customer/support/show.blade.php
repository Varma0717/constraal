@extends('customer.layouts.app')

@section('title', 'Support Ticket')
@section('page-title', 'Support Ticket - ' . $ticket->ticket_number)
@section('icon', 'bi-chat-left-text')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">{{ $ticket->subject }}</h5>
                        <small class="text-muted">{{ $ticket->ticket_number }}</small>
                    </div>
                    <div>
                        <span class="badge {{ $ticket->status === 'open' ? 'bg-warning' : 'bg-secondary' }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                        <span class="badge {{ $ticket->priority === 'high' ? 'bg-danger' : ($ticket->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">
                    <small>Created {{ $ticket->created_at->format('M d, Y H:i') }}</small>
                </p>
                <p>{{ $ticket->message }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Responses</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($ticket->replies as $reply)
                    <div class="list-group-item">
                        <div class="d-flex gap-3">
                            <div class="reply-avatar {{ $reply->type === 'admin' ? 'reply-avatar--admin' : 'reply-avatar--customer' }}">
                                {{ $reply->type === 'admin' ? 'S' : strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div style="flex-grow: 1;">
                                <h6 class="mb-1">{{ $reply->type === 'admin' ? 'Support Team' : auth()->user()->name }}</h6>
                                <p class="mb-1">{{ $reply->message }}</p>
                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item text-center text-muted py-4">
                        <i class="bi bi-chat-left" style="font-size: 1.5rem;"></i>
                        <p class="mt-2 mb-0">No responses yet. Our team will review your ticket shortly.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        @if($ticket->status === 'open')
        <div class="card mt-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
                <h5 class="card-title mb-0">Add Response</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('account.customer.support.reply', $ticket) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="message">Your Message</label>
                        <textarea
                            class="form-control"
                            id="message"
                            name="message"
                            rows="4"
                            placeholder="Type your response..."
                            required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send"></i> Send Response
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <form method="POST" action="{{ route('account.customer.support.close', $ticket) }}">
                @csrf
                <button type="submit" class="btn btn-outline-secondary" onclick="return confirm('Are you sure?');">
                    <i class="bi bi-check-circle"></i> Close Ticket
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection