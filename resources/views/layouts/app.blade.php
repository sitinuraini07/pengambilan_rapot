<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'E-Raport - Aplikasi Pengambilan Rapot')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Modern CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-primary: #e8f0fe;        /* Biru soft sangat muda untuk background utama */
            --bg-secondary: #d4e3fd;       /* Biru soft sedikit lebih tua */
            --bg-card: #ffffff;             /* Card putih bersih */
            --bg-card-hover: #f5f9ff;       /* Hover dengan biru sangat soft */
            --text-primary: #1e293b;        /* Dark blue untuk teks utama (kontras dengan background terang) */
            --text-secondary: #334155;       /* Sedikit lebih muda */
            --text-muted: #64748b;           /* Abu-abu kebiruan */
            --accent: #2563eb;               /* Biru lebih bold untuk aksen */
            --accent-light: #3b82f6;          /* Biru terang */
            --accent-soft: #93c5fd;           /* Biru sangat soft */
            --accent-gradient: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            --border-color: #cbd5e1;          /* Abu-abu kebiruan untuk border */
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-light);
        }

        /* Navigation */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            text-decoration: none;
        }

        .navbar-brand i {
            margin-right: 8px;
            color: var(--accent);
            -webkit-text-fill-color: var(--accent);
        }

        .btn-custom {
            background: white;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        .btn-custom:hover {
            background: var(--bg-card-hover);
            border-color: var(--accent);
            color: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.1);
        }

        .btn-custom i {
            font-size: 1.1rem;
        }

        .btn-custom-light {
            background: var(--accent-gradient);
            border: none;
            color: white;
        }

        .btn-custom-light:hover {
            background: var(--accent);
            color: white;
            border: none;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }

        /* Container */
        .container-custom {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Content Wrapper */
        .content-wrapper {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-primary);
        }

        .page-header h1 i {
            margin-right: 12px;
            color: var(--accent);
        }

        .breadcrumb {
            background: var(--bg-card);
            padding: 0.5rem 1rem;
            border-radius: 100px;
            border: 1px solid var(--border-color);
            margin: 0;
            list-style: none;
            display: flex;
            gap: 0.5rem;
        }

        .breadcrumb-item {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .breadcrumb-item a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--accent);
        }

        .breadcrumb-item.active {
            color: var(--accent);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: var(--bg-secondary);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon i {
            font-size: 2rem;
            color: var(--accent);
        }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            line-height: 1;
            color: var(--text-primary);
        }

        .stat-content p {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin: 0;
        }

        /* Tables */
        .table-responsive {
            overflow-x: auto;
            margin: 1.5rem 0;
        }

        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .table-custom thead th {
            background: var(--bg-secondary);
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
            text-align: left;
        }

        .table-custom tbody tr {
            background: var(--bg-card);
            border-radius: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        .table-custom tbody tr:hover {
            background: var(--bg-card-hover);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.1);
        }

        .table-custom td {
            padding: 1rem;
            color: var(--text-primary);
            border: none;
            border-top: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .table-custom td:first-child {
            border-radius: 16px 0 0 16px;
        }

        .table-custom td:last-child {
            border-radius: 0 16px 16px 0;
        }

        /* Badges */
        .badge-custom {
            padding: 0.4rem 1rem;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: var(--bg-secondary);
            color: var(--text-secondary);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-action:hover {
            border-color: var(--accent);
            color: var(--accent);
            transform: translateY(-2px);
            background: white;
        }

        .btn-action-edit:hover {
            border-color: var(--success);
            color: var(--success);
        }

        .btn-action-delete:hover {
            border-color: var(--danger);
            color: var(--danger);
        }

        /* Pagination */
        .pagination-custom {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 2rem;
        }

        .pagination-custom .pagination {
            display: flex;
            gap: 8px;
            list-style: none;
        }

        .pagination-custom .page-item .page-link {
            background: white;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            border-radius: 12px;
            padding: 0.6rem 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }

        .pagination-custom .page-item .page-link:hover {
            background: var(--bg-card-hover);
            border-color: var(--accent);
            color: var(--accent);
        }

        .pagination-custom .page-item.active .page-link {
            background: var(--accent-gradient);
            border-color: var(--accent);
            color: white;
        }

        .pagination-custom .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }

        /* Footer */
        .footer-custom {
            margin-top: 3rem;
            padding: 2rem 0;
            background: white;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-version {
            background: var(--bg-secondary);
            padding: 0.4rem 1rem;
            border-radius: 100px;
            border: 1px solid var(--border-color);
        }

        /* Alert */
        .alert-custom {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-custom i {
            font-size: 1.5rem;
        }

        .alert-success {
            border-left: 4px solid var(--success);
        }

        .alert-success i {
            color: var(--success);
        }

        .alert-danger {
            border-left: 4px solid var(--danger);
        }

        .alert-danger i {
            color: var(--danger);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container-custom {
                padding: 1rem;
            }
            
            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar-custom">
    <div class="container-custom">
        <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-journal-bookmark-fill"></i>
                E-Raport
            </a>
            
            <div style="display: flex; align-items: center; gap: 1rem;">
                @if (Route::has('login'))
                    @auth
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span style="color: var(--text-secondary);">
                                <i class="bi bi-person-circle"></i>
                                {{ Auth::user()->name }}
                            </span>
                            <a href="{{ route('logout') }}" class="btn-custom" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-custom">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-custom btn-custom-light">
                                <i class="bi bi-person-plus"></i>
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
                
                <a href="{{ route('guru.index') }}" class="btn-custom" style="background: var(--accent); color: white; border: none;">
                    <i class="bi bi-people-fill"></i>
                    Data Guru
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container-custom">
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <i class="bi bi-{{ $icon ?? 'house-door-fill' }}"></i>
            @yield('page-title', 'Dashboard')
        </h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
                @yield('breadcrumb')
            </ol>
        </div>
    </div>

    <!-- Content -->
    <div class="content-wrapper">
        @if(session('success'))
            <div class="alert-custom alert-success">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-custom alert-danger">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="footer-custom">
    <div class="container-custom">
        <div class="footer-content">
            <div>
                <i class="bi bi-c-circle"></i> {{ date('Y') }} E-Raport SMK INFORMATIKA UTAMA. All rights reserved.
            </div>
            <div class="footer-version">
                <i class="bi bi-info-circle"></i> 
                v{{ Illuminate\Foundation\Application::VERSION }}
            </div>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>