@extends('layouts.admin')

@section('title', 'Subscriber Details')
@section('page-title', 'Subscriber Details')
@section('icon', 'bi-person')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Subscriber Information</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Name</label>
                <p>{{ $subscriber->name ?: '—' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Email</label>
                <p>{{ $subscriber->email }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Source</label>
                <p>{{ $subscriber->source }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Status</label>
                <p>
                    @if($subscriber->unsubscribed_at)
                    <span class="badge bg-secondary">Unsubscribed</span>
                    @elseif($subscriber->verified_at)
                    <span class="badge bg-success">Verified</span>
                    @else
                    <span class="badge bg-warning">Pending Verification</span>
                    @endif
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Subscribed At</label>
                <p>{{ $subscriber->created_at?->format('M d, Y H:i') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Verified At</label>
                <p>{{ $subscriber->verified_at?->format('M d, Y H:i') ?: '—' }}</p>
            </div>
        </div>

        <hr>

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.subscribers.index') }}" class="btn btn-outline-secondary">Back</a>

            @if(!$subscriber->verified_at)
            <form action="{{ route('admin.subscribers.verify', $subscriber) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Verify</button>
            </form>
            @endif

            @if(!$subscriber->unsubscribed_at)
            <form action="{{ route('admin.subscribers.unsubscribe', $subscriber) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Unsubscribe</button>
            </form>
            @endif

            <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" onsubmit="return confirm('Delete this subscriber?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
