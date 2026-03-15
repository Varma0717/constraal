@php use Illuminate\Support\Str; @endphp
@extends('layouts.admin')

@section('title', 'Login Attempts')
@section('page-title', 'Login Attempts')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Login Attempts</h5>
    </div>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>IP Address</th>
                        <th>Status</th>
                        <th>User Agent</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attempts as $attempt)
                    <tr>
                        <td>{{ $attempt->id }}</td>
                        <td>{{ $attempt->email }}</td>
                        <td>{{ $attempt->ip_address }}</td>
                        <td>
                            @if($attempt->successful)
                            <span class="badge bg-success">Success</span>
                            @else
                            <span class="badge bg-danger">Failed</span>
                            @endif
                        </td>
                        <td><small>{{ Str::limit($attempt->user_agent, 50) }}</small></td>
                        <td>{{ $attempt->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No login attempts found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($attempts->hasPages())
    <div class="card-footer">
        {{ $attempts->links() }}
    </div>
    @endif
</div>
@endsection