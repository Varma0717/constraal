@extends('layouts.admin')

@section('title', 'Media Management')
@section('page-title', 'Media Management')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Upload File</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="file" class="form-label">Select File *</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" required>
                        <small class="text-muted">Max file size: 10MB</small>
                        @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Media Library</h5>
                <span class="badge bg-secondary">{{ $media->total() }} files</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @forelse($media as $file)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body p-2">
                                @if($file->type === 'image')
                                <img src="{{ asset('storage/' . $file->file_path) }}" alt="{{ $file->name }}" class="img-fluid rounded mb-2" style="max-height: 150px; width: 100%; object-fit: cover;">
                                @else
                                <div class="d-flex align-items-center justify-content-center bg-light rounded mb-2" style="height: 150px;">
                                    @if($file->type === 'video')
                                    <i class="bi bi-camera-video" style="font-size: 48px;"></i>
                                    @else
                                    <i class="bi bi-file-earmark" style="font-size: 48px;"></i>
                                    @endif
                                </div>
                                @endif
                                <p class="mb-1 small text-truncate" title="{{ $file->name }}">{{ $file->name }}</p>
                                <p class="mb-2 text-muted small">{{ number_format($file->file_size / 1024, 2) }} KB</p>
                                <div class="d-flex gap-1">
                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">View</a>
                                    <form action="{{ route('admin.media.destroy', $file) }}" method="POST" onsubmit="return confirm('Delete this file?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-images" style="font-size: 48px; color: #ccc;"></i>
                        <p class="text-muted mt-2">No media files uploaded yet</p>
                    </div>
                    @endforelse
                </div>
            </div>
            @if($media->hasPages())
            <div class="card-footer">
                {{ $media->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection