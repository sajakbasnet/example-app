@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <p class="page-subtitle">Welcome back, {{ $user->name }}!</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">👤</div>
            <div class="stat-label">Logged in as {{ $user->email }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $user->created_at->format('M d, Y') }}</div>
            <div class="stat-label">Member Since</div>
        </div>

        <div class="stat-card">
            <div class="stat-number">🔒</div>
            <div class="stat-label">Secure Access</div>
        </div>

        <div class="stat-card">
            <div class="stat-number">✅</div>
            <div class="stat-label">Account Active</div>
        </div>
    </div>

    <div class="card">
        <h2 class="card-title">Quick Actions</h2>
        <p style="margin-bottom: 1.5rem; color: #666;">
            Manage your account settings and profile information from the dashboard.
        </p>

        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="/profile" class="btn btn-primary">
                Edit Profile
            </a>
        </div>
    </div>

    <div class="card">
        <h2 class="card-title">Account Information</h2>
        <div style="display: grid; gap: 1rem;">
            <div>
                <strong>Full Name:</strong> {{ $user->name }}
            </div>
            <div>
                <strong>Email Address:</strong> {{ $user->email }}
            </div>
            <div>
                <strong>Account ID:</strong> #{{ $user->id }}
            </div>
            <div>
                <strong>Last Login:</strong> {{ now()->format('M d, Y h:i A') }}
            </div>
        </div>
    </div>
@endsection
