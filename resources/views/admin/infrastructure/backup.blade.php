@extends('layouts.admin')

@section('title', 'Backup & Restore')
@section('page-title', 'Backup & Restore')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-cloud-download"></i> Create Backup</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">Create a database backup that can be used to restore your data if needed.</p>

                <form action="{{ route('admin.infrastructure.create-backup') }}" method="POST" onsubmit="return confirm('Create a new database backup?')">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-download"></i> Create Database Backup
                    </button>
                </form>

                <div class="alert alert-info mt-4 mb-0">
                    <small>
                        <strong>Note:</strong> Backups are stored in <code>storage/app/backups/</code>.
                        Make sure to download them periodically for offsite storage.
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-folder2-open"></i> Recent Backups</h5>
            </div>
            <div class="card-body">
                @php
                $backupPath = storage_path('app/backups');
                $backups = [];
                if (file_exists($backupPath)) {
                $files = scandir($backupPath);
                foreach ($files as $file) {
                if (str_ends_with($file, '.sql')) {
                $backups[] = [
                'name' => $file,
                'size' => filesize($backupPath . '/' . $file),
                'date' => filemtime($backupPath . '/' . $file)
                ];
                }
                }
                usort($backups, fn($a, $b) => $b['date'] - $a['date']);
                $backups = array_slice($backups, 0, 10);
                }
                @endphp

                @if(count($backups) > 0)
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Filename</th>
                                <th>Size</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $backup)
                            <tr>
                                <td><code>{{ $backup['name'] }}</code></td>
                                <td>{{ round($backup['size'] / 1024, 2) }} KB</td>
                                <td>{{ date('M d, Y H:i', $backup['date']) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center mb-0">No backups found</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-info-circle"></i> Backup Best Practices</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <h6><i class="bi bi-calendar-check text-primary"></i> Regular Schedule</h6>
                <p class="text-muted small">Create backups on a regular schedule (daily or weekly) depending on how frequently your data changes.</p>
            </div>
            <div class="col-md-4">
                <h6><i class="bi bi-cloud-upload text-success"></i> Offsite Storage</h6>
                <p class="text-muted small">Download backups and store them in a secure offsite location (cloud storage, external drive, etc.).</p>
            </div>
            <div class="col-md-4">
                <h6><i class="bi bi-shield-check text-warning"></i> Test Restores</h6>
                <p class="text-muted small">Periodically test your backups by restoring them to a test environment to ensure they work correctly.</p>
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