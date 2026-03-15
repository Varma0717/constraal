@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
<div class="admin-content">
    <h1>Add User</h1>
    <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password')
            <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="admin-btn">Create User</button>
        <a href="{{ route('admin.users.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
    </form>
</div>
@endsection