@extends('layouts.admin')

@section('title', 'Maintenance Mode')
@section('page-title', 'Maintenance Mode')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-tools"></i> Maintenance Mode</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    @if($isMaintenanceMode)
                    <div class="mb-3">
                        <span class="badge bg-warning" style="font-size: 24px; padding: 15px 30px;">
                            <i class="bi bi-exclamation-triangle"></i> MAINTENANCE MODE ACTIVE
                        </span>
                    </div>
                    <p class="text-muted">The website is currently in maintenance mode. Only admins can access it.</p>
                    @else
                    <div class="mb-3">
                        <span class="badge bg-success" style="font-size: 24px; padding: 15px 30px;">
                            <i class="bi bi-check-circle"></i> SITE IS LIVE
                        </span>
                    </div>
                    <p class="text-muted">The website is live and accessible to all users.</p>
                    @endif
                </div>

                <form action="{{ route('admin.infrastructure.toggle-maintenance') }}" method="POST">
                    @csrf

                    @if(!$isMaintenanceMode)
                    <div class="mb-3">
                        <label for="message" class="form-label">Maintenance Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="The site is currently under maintenance. Please check back soon.">{{ $maintenanceMessage }}</textarea>
                        <small class="text-muted">This message will be shown to visitors during maintenance.</small>
                    </div>
                    @endif

                    @if($isMaintenanceMode)
                    <button type="submit" class="btn btn-success btn-lg w-100">
                        <i class="bi bi-play-circle"></i> Disable Maintenance Mode
                    </button>
                    @else
                    <button type="submit" class="btn btn-warning btn-lg w-100" onclick="return confirm('Enable maintenance mode? This will make the site inaccessible to regular users.')">
                        <i class="bi bi-pause-circle"></i> Enable Maintenance Mode
                    </button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Information</h5>
            </div>
            <div class="card-body">
                <h6>What happens during maintenance mode?</h6>
                <ul>
                    <li>Regular users will see a maintenance page</li>
                    <li>Admin users can still access the admin panel</li>
                    <li>API endpoints may return 503 errors</li>
                    <li>Scheduled jobs will continue to run</li>
                </ul>

                <h6 class="mt-4">When to use maintenance mode?</h6>
                <ul>
                    <li>During major database migrations</li>
                    <li>When performing system updates</li>
                    <li>During scheduled maintenance windows</li>
                    <li>When diagnosing critical issues</li>
                </ul>

                <div class="alert alert-warning mt-4 mb-0">
                    <strong>Note:</strong> Remember to disable maintenance mode after completing your work!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.infrastructure.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Infrastructure
    </a>
</div>
@endsection