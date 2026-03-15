@extends('customer.layouts.app')

@section('title', 'Activity History')
@section('page-title', 'Account Activity')
@section('icon', 'bi-clock-history')

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; padding: 15px;">
        <h5 class="card-title mb-0">Account Activity Timeline</h5>
    </div>
    <div class="card-body p-0">
        @if($activities->count() > 0)
        <div class="list-group list-group-flush">
            @foreach($activities as $activity)
            <div class="list-group-item d-flex gap-3">
                <div style="min-width: 40px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #667eea; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-check" style="color: white;"></i>
                    </div>
                </div>
                <div style="flex-grow: 1;">
                    <h6 class="mb-1">{{ ucfirst(str_replace('_', ' ', $activity->action)) }}</h6>
                    <p class="text-muted mb-1" style="font-size: 0.9rem;">{{ $activity->description }}</p>
                    <small class="text-muted">
                        <i class="bi bi-geo-alt"></i> {{ $activity->ip_address ?? 'Unknown' }} •
                        {{ $activity->created_at->format('M d, Y H:i:s') }}
                    </small>
                </div>
            </div>
            @endforeach
        </div>
        {{ $activities->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-inbox" style="font-size: 2rem; color: #ccc;"></i>
            <p class="text-muted mt-3">No activity yet</p>
        </div>
        @endif
    </div>
</div>
@endsection