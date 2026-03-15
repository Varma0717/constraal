@extends('customer.layouts.app')

@section('title', 'Support')
@section('page-title', 'Support Center')
@section('icon', 'bi-chat-left-text')

@section('content')
<div class="mb-4">
    <a href="{{ route('account.customer.support.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Create Support Ticket
    </a>
</div>

<div class="card">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">Your Support Tickets</h5>
    </div>
    <div class="card-body p-0">
        @if($tickets->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th>Ticket ID</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td><code>{{ $ticket->ticket_number }}</code></td>
                        <td>{{ $ticket->subject }}</td>
                        <td>
                            <span class="badge {{ $ticket->status === 'open' ? 'bg-warning' : 'bg-secondary' }}">
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $ticket->priority === 'high' ? 'bg-danger' : ($ticket->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                {{ ucfirst($ticket->priority) }}
                            </span>
                        </td>
                        <td>{{ $ticket->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('account.customer.support.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $tickets->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-chat-left" style="font-size: 2rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No support tickets yet</p>
        </div>
        @endif
    </div>
</div>
@endsection