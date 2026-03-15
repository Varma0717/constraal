@extends('customer.layouts.app')

@section('title', 'Profile')
@section('page-title', 'My Profile')
@section('icon', 'bi-person')

@section('content')
<div class="portal-card">
    <div class="portal-card-header">
        <h5 class="portal-card-title">Profile Information</h5>
    </div>
    <div class="portal-info-grid">
        <div>
            <div class="portal-info-label">Full Name</div>
            <div class="portal-info-value">{{ $user->name }}</div>
        </div>
        <div>
            <div class="portal-info-label">Email</div>
            <div class="portal-info-value">{{ $user->email }}</div>
        </div>
        <div>
            <div class="portal-info-label">Phone</div>
            <div class="portal-info-value">{{ $user->phone ?? 'Not provided' }}</div>
        </div>
        <div>
            <div class="portal-info-label">Account Created</div>
            <div class="portal-info-value">{{ $accountCreated }}</div>
        </div>
        <div>
            <div class="portal-info-label">Last Login</div>
            <div class="portal-info-value">{{ $lastLogin }}</div>
        </div>
    </div>

    <div class="portal-actions mt-4">
        <a href="{{ route('account.customer.profile.edit') }}" class="portal-button">
            Edit Profile
        </a>
        <a href="{{ route('account.customer.profile.change-password') }}" class="portal-button portal-button--ghost">
            Change Password
        </a>
    </div>
</div>
@endsection