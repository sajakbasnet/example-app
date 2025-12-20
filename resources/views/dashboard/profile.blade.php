@extends('dashboard.layout')

@section('title', 'Profile')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Profile Settings</h1>
        <p class="page-subtitle">Manage your personal information and account settings</p>
    </div>

    <div class="card">
        <h2 class="card-title">Personal Information</h2>
        <form method="POST" action="/profile/update">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    autofocus>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update Profile
            </button>
        </form>
    </div>

    <div class="card">
        <h2 class="card-title">Account Details</h2>
        <div style="display: grid; gap: 1rem;">
            <div>
                <strong>Account ID:</strong> #{{ $user->id }}
            </div>
            <div>
                <strong>Registration Date:</strong> {{ $user->created_at->format('M d, Y h:i A') }}
            </div>
            <div>
                <strong>Last Updated:</strong> {{ $user->updated_at->format('M d, Y h:i A') }}
            </div>
            <div>
                <strong>Email Verified:</strong>
                @if ($user->email_verified_at)
                    <span style="color: #28a745;">✓ {{ $user->email_verified_at->format('M d, Y') }}</span>
                @else
                    <span style="color: #dc3545;">✗ Not verified</span>
                @endif
            </div>
        </div>
    </div>

    <div class="card">
        <h2 class="card-title">Security</h2>
        <p style="margin-bottom: 1.5rem; color: #666;">
            Your account is protected with secure password hashing and session management.
        </p>
        <div style="display: grid; gap: 1rem;">
            <div>
                <strong>Password:</strong> ••••••••
            </div>
            <div>
                <strong>Two-Factor Authentication:</strong>
                <span style="color: #ffc107;">⚠ Not enabled</span>
            </div>
            <div>
                <strong>Login Sessions:</strong> Active
            </div>
        </div>
    </div>
@endsection
