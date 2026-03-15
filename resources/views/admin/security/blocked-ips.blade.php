@extends('layouts.admin')

@section('title', 'Blocked IPs')
@section('page-title', 'Blocked IPs')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Block IP Address</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.security.block-ip') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="ip_address" class="form-label">IP Address *</label>
                        <input type="text" class="form-control @error('ip_address') is-invalid @enderror" id="ip_address" name="ip_address" placeholder="192.168.1.1" required>
                        @error('ip_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason</label>
                        <textarea class="form-control" id="reason" name="reason" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_permanent" name="is_permanent" value="1">
                            <label class="form-check-label" for="is_permanent">
                                Permanent Block
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="blocked_until" class="form-label">Block Until (if not permanent)</label>
                        <input type="datetime-local" class="form-control" id="blocked_until" name="blocked_until">
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Block IP</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Blocked IP Addresses</h5>
            </div>
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>IP Address</th>
                                <th>Reason</th>
                                <th>Blocked Until</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ips as $ip)
                            <tr>
                                <td>{{ $ip->ip_address }}</td>
                                <td>{{ $ip->reason ?? 'No reason provided' }}</td>
                                <td>
                                    @if($ip->is_permanent)
                                    <span class="badge bg-danger">Permanent</span>
                                    @elseif($ip->blocked_until)
                                    {{ $ip->blocked_until->format('M d, Y H:i') }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.security.unblock-ip', $ip->ip_address) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to unblock this IP?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-success">Unblock</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">No blocked IPs</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($ips->hasPages())
            <div class="card-footer">
                {{ $ips->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection