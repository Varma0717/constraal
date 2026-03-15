@extends('layouts.admin')

@section('title', 'Inquiries')
@section('page-title', 'Contact Inquiries')
@section('icon', 'bi-question-circle')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h5 class="mb-0">Inquiries</h5>
            <small class="text-muted">Messages submitted through the contact form.</small>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td><span class="badge bg-success">{{ $inquiry->type }}</span></td>
                    <td>{{ $inquiry->created_at?->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">No inquiries yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $inquiries->links() }}
</div>
@endsection
