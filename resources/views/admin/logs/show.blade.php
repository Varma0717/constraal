@extends('layouts.admin')

@section('title', 'Log Details')
@section('page-title', 'Log Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Log Entry #{{ $log->id }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 150px;">Log ID</th>
                        <td>{{ $log->id }}</td>
                    </tr>
                    <tr>
                        <th>Admin</th>
                        <td>
                            @if($log->admin)
                            {{ $log->admin->name }} ({{ $log->admin->email }})
                            @else
                            System
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td><code>{{ $log->action }}</code></td>
                    </tr>
                    <tr>
                        <th>Target</th>
                        <td>{{ $log->target ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 150px;">IP Address</th>
                        <td>{{ $log->ip_address }}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{ $log->created_at->format('M d, Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>User Agent</th>
                        <td><small>{{ $log->user_agent ?? 'N/A' }}</small></td>
                    </tr>
                </table>
            </div>
        </div>

        @if($log->description)
        <div class="mt-4">
            <h6>Description</h6>
            <div class="p-3 bg-light rounded">
                {{ $log->description }}
            </div>
        </div>
        @endif

        @if($log->metadata)
        <div class="mt-4">
            <h6>Additional Data</h6>
            <pre class="p-3 bg-light rounded" style="max-height: 300px; overflow-y: auto;">{{ json_encode(json_decode($log->metadata), JSON_PRETTY_PRINT) }}</pre>
        </div>
        @endif
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.logs.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Logs
    </a>
</div>
@endsection