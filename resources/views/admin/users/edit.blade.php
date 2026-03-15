@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="admin-content">
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="admin-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
            <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
            <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="admin-btn">Update User</button>
        <a href="{{ route('admin.users.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
    </form>
</div>
@endsection