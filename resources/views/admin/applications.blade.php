@extends('layouts.admin')

@section('title', 'Applications')
@section('page-title', 'Job Applications')
@section('icon', 'bi-file-person')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h5 class="mb-0">Job Applications</h5>
            <small class="text-muted">Review applicants submitted through the careers page.</small>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Email</th>
                    <th>Job</th>
                    <th>Status</th>
                    <th>Submitted</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $application)
                <tr>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->job?->title ?? '—' }}</td>
                    <td><span class="badge bg-primary">{{ $application->status }}</span></td>
                    <td>{{ $application->created_at?->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No applications yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $applications->links() }}
</div>
@endsection
