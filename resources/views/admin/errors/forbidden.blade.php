@extends('layouts.admin')

@section('title', '403 Forbidden')

@section('content')
<div style="text-align: center; padding: 60px 20px;">
    <div style="font-size: 48px; color: #f5576c; margin-bottom: 20px;">
        <i class="bi bi-exclamation-triangle"></i>
    </div>
    <h2 style="margin-bottom: 15px;">Access Forbidden</h2>
    <p style="color: #666; margin-bottom: 30px;">You don't have permission to access this resource.</p>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
        <i class="bi bi-house"></i> Go to Dashboard
    </a>
</div>
@endsection