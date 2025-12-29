<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Backend</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-name {
            font-weight: 500;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Navigation */
        .nav-container {
            background: white;
            border-bottom: 1px solid #e1e5e9;
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            padding: 0 2rem;
        }

        .nav-item {
            padding: 1rem 1.5rem;
            text-decoration: none;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .nav-item:hover {
            color: #667eea;
            background: #f8f9fa;
        }

        .nav-item.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #666;
            font-size: 1rem;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        /* Actions Section - For search and create button */
        .actions-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .search-form {
            flex: 1;
            min-width: 280px;
        }

        .search-form .input-group {
            display: flex;
            gap: 0.5rem;
            align-items: stretch;
        }

        .search-form .input-group .form-control {
            flex: 1;
        }

        .search-form .input-group .btn {
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        /* Success Message */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            border: 1px solid #c3e6cb;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e1e5e9;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Form Row for two-column layout */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        /* Input with prefix (for price field) */
        .input-with-prefix {
            position: relative;
        }

        .input-prefix {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-weight: 500;
            z-index: 1;
        }

        .input-with-prefix .form-control {
            padding-left: 2rem;
        }

        /* Checkbox styling */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            font-weight: 500;
        }

        .checkbox-label input[type="checkbox"] {
            width: auto;
            margin: 0;
            cursor: pointer;
        }

        .form-help {
            color: #666;
            font-size: 0.875rem;
            margin-left: 1.5rem;
        }

        /* Error summary */
        .error-summary {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            border: 1px solid #f5c6cb;
        }

        .error-summary h4 {
            margin-bottom: 0.5rem;
            color: #721c24;
        }

        .error-summary ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        /* Form actions */
        .form-actions {
            display: flex;
            gap: 1rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e1e5e9;
            margin-top: 2rem;
        }

        .form-actions .btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Product form specific styling */
        .product-form {
            max-width: 800px;
        }

        .form-group .error {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            background: white;
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table thead th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            border-bottom: 1px solid #e1e5e9;
            transition: background-color 0.2s;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody td {
            padding: 1rem;
            color: #333;
            font-size: 0.95rem;
        }

        .table-bordered {
            border: 1px solid #e1e5e9;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-bordered thead th {
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .table-bordered thead th:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .table-bordered tbody td:not(:last-child) {
            border-right: 1px solid #e1e5e9;
        }

        .card-body {
            padding: 0;
        }

        .card-body .table {
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav {
                flex-direction: column;
                padding: 0;
            }

            .nav-item {
                border-bottom: 1px solid #e1e5e9;
                border-radius: 0;
            }

            .main-container {
                padding: 0 1rem;
            }

            .table {
                font-size: 0.875rem;
            }

            .table thead th,
            .table tbody td {
                padding: 0.75rem 0.5rem;
            }

            .table thead th {
                font-size: 0.8rem;
            }

            /* Mobile responsive for actions section */
            .actions-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-form {
                min-width: auto;
            }

            .search-form .input-group {
                flex-direction: column;
                gap: 0.75rem;
            }

            .search-form .input-group .btn {
                width: 100%;
                justify-content: center;
            }

            /* Mobile responsive for form rows */
            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            /* Mobile responsive for form actions */
            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
                justify-content: center;
            }

            /* Mobile responsive for cards */
            .card {
                padding: 1rem;
            }

            .product-form {
                max-width: 100%;
            }
        }

        /* Extra small screens */
        @media (max-width: 480px) {
            .page-title {
                font-size: 1.5rem;
            }

            .btn {
                padding: 0.625rem 1rem;
                font-size: 0.9rem;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                padding: 0.625rem;
                font-size: 0.9rem;
            }

            .input-with-prefix .form-control {
                padding-left: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                Backend Dashboard
            </div>
            <div class="user-menu">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="user-name">{{ $user->name }}</div>
                </div>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="nav-container">
        <div class="nav">
            <a href="/dashboard" class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="/profile" class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                Profile
            </a>
            <a href="/products" class="nav-item {{ request()->is('products') ? 'active' : '' }}">
                Products
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-container">
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>

</html>
