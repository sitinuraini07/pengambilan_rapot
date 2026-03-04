<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Raport - Aplikasi Pengambilan Rapot</title>

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

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
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
        .nav {
            position: fixed;
            top: 0;
            right: 0;
            padding: 2rem;
            z-index: 100;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 0.5rem;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .nav-link:hover {
            background: var(--bg-card-hover);
            color: var(--accent);
        }

        .nav-link:first-child {
            background: var(--accent);
            color: white;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #e8f0fe 0%, #d4e3fd 100%);
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.1"><path d="M20 20 L80 20 L80 80 L20 80 Z" fill="none" stroke="%232563eb" stroke-width="1"/><path d="M30 30 L70 30 L70 70 L30 70 Z" fill="none" stroke="%232563eb" stroke-width="1"/><circle cx="50" cy="50" r="10" fill="none" stroke="%232563eb" stroke-width="1"/></svg>') repeat;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(50px, 50px) rotate(45deg); }
        }

        .hero-content {
            text-align: center;
            z-index: 1;
            max-width: 900px;
            padding: 2rem;
        }

        .logo-wrapper {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            background: var(--accent-gradient);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.2);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 20px 40px rgba(37, 99, 235, 0.2); }
            50% { transform: scale(1.05); box-shadow: 0 30px 50px rgba(37, 99, 235, 0.3); }
        }

        .logo svg {
            width: 50px;
            height: 50px;
            fill: white;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .hero h1 span {
            color: var(--accent);
        }

        .hero .subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero .badge {
            display: inline-block;
            background: white;
            border: 1px solid var(--border-color);
            color: var(--accent);
            padding: 0.5rem 1.5rem;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        /* Search Section */
        .search-section {
            background: white;
            border-radius: 30px;
            padding: 3rem;
            margin-top: 2rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .search-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .search-title h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .search-title p {
            color: var(--text-secondary);
        }

        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            color: var(--text-primary);
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            background: white;
        }

        .form-control option {
            background: white;
        }

        .btn-search {
            background: var(--accent-gradient);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            height: 100%;
            min-height: 54px;
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }

        .btn-search svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Info Cards */
        .info-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .info-card {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .info-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent);
            background: white;
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.1);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
        }

        .info-icon svg {
            width: 24px;
            height: 24px;
            stroke: var(--accent);
        }

        .info-content h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: var(--text-primary);
        }

        .info-content p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Announcements Section */
        .announcements {
            padding: 4rem 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .section-header h2 span {
            color: var(--accent);
        }

        .view-all {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .view-all:hover {
            color: var(--accent);
        }

        .announcement-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .announcement-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .announcement-card:hover {
            border-color: var(--accent);
            transform: translateX(5px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.1);
        }

        .announcement-date {
            color: var(--accent);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .announcement-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
        }

        .announcement-card p {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .announcement-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .badge-new {
            background: var(--accent);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Quick Access */
        .quick-access {
            padding: 4rem 0;
            background: white;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 2rem;
        }

        .quick-item {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            text-decoration: none;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .quick-item:hover {
            border-color: var(--accent);
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.1);
        }

        .quick-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--accent);
        }

        .quick-item span {
            font-weight: 600;
        }

        /* Footer */
        .footer {
            background: white;
            border-top: 1px solid var(--border-color);
            padding: 3rem 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-about h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .footer-about p {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
        }

        .footer-links h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .footer-version {
            background: var(--bg-primary);
            padding: 0.5rem 1rem;
            border-radius: 100px;
            border: 1px solid var(--border-color);
        }

        /* Responsive */
        @media (max-width: 968px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .info-cards {
                grid-template-columns: 1fr;
            }
            
            .announcement-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .search-form {
                grid-template-columns: 1fr;
            }
            
            .nav {
                position: relative;
                padding: 1rem;
                display: flex;
                justify-content: center;
            }
            
            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .quick-grid {
                grid-template-columns: 1fr;
            }
            
            .nav-links {
                flex-direction: column;
                width: 100%;
            }
            
            .nav-link {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    @if (Route::has('login'))
        <nav class="nav">
            <div class="nav-links">
                @auth
                    <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            </div>
        </nav>
    @endif

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="logo-wrapper">
                <div class="logo">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            
            <span class="badge">📚 Semester Genap 2023/2024</span>
            <h1>E-Raport<br><span>SMK INFORMATIKA UTAMA</span></h1>
            <p class="subtitle">Akses raport online dengan mudah, cepat, dan aman. Pantau perkembangan akademik putra-putri Anda secara real-time.</p>

            <!-- Search Section -->
            <div class="search-section">
                <div class="search-title">
                    <h2>Cari Raport Siswa</h2>
                    <p>Masukkan data siswa untuk melihat raport</p>
                </div>
                
                <form class="search-form" action="/search" method="GET">
                    <div class="form-group">
                        <label>NIS/NISN</label>
                        <input type="text" class="form-control" placeholder="Contoh: 123456789" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control">
                            <option>2023/2024</option>
                            <option>2022/2023</option>
                            <option>2021/2022</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control">
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn-search">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari Raport
                    </button>
                </form>

                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="info-content">
                            <h4>Pengambilan Raport</h4>
                            <p>24-28 Juni 2024</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="info-content">
                            <h4>Total Siswa</h4>
                            <p>1,234 Siswa Aktif</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="info-content">
                            <h4>Raport Tersedia</h4>
                            <p>98% Sudah Terbit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="announcements">
        <div class="container">
            <div class="section-header">
                <h2>Pengumuman <span>Terbaru</span></h2>
                <a href="#" class="view-all">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="announcement-grid">
                <div class="announcement-card">
                    <div class="announcement-date">📅 15 Juni 2024</div>
                    <h3>Jadwal Pengambilan Raport Semester Genap</h3>
                    <p>Pengambilan raport akan dilaksanakan pada tanggal 24-28 Juni 2024. Harap hadir sesuai jadwal yang telah ditentukan.</p>
                    <div class="announcement-meta">
                        <span>Oleh: Tata Usaha</span>
                        <span class="badge-new">Baru</span>
                    </div>
                </div>

                <div class="announcement-card">
                    <div class="announcement-date">📅 10 Juni 2024</div>
                    <h3>Pembagian Kelas XI untuk Tahun Ajaran Baru</h3>
                    <p>Pengumuman pembagian kelas XI IPA dan IPS dapat dilihat melalui website sekolah mulai tanggal 20 Juni 2024.</p>
                    <div class="announcement-meta">
                        <span>Oleh: Waka Kurikulum</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access -->
    <section class="quick-access">
        <div class="container">
            <div class="section-header">
                <h2>Akses <span>Cepat</span></h2>
            </div>

            <div class="quick-grid">
                <a href="#" class="quick-item">
                    <div class="quick-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span>Kalender Akademik</span>
                </a>

                <a href="#" class="quick-item">
                    <div class="quick-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span>Daftar Ulang</span>
                </a>

                <a href="#" class="quick-item">
                    <div class="quick-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span>Jadwal Ujian</span>
                </a>

                <a href="#" class="quick-item">
                    <div class="quick-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <span>Data Guru</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>SMK INFORMATIKA UTAMA</h3>
                    <p>Jl. Raya Pendidikan No. 123, Jakarta Pusat. Unggul dalam prestasi, luhur dalam budi pekerti.</p>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#">Profil Sekolah</a></li>
                        <li><a href="#">Visi & Misi</a></li>
                        <li><a href="#">Fasilitas</a></li>
                        <li><a href="#">Ekstrakurikuler</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Bantuan</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Panduan</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">Pengaduan</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Kontak</h4>
                    <ul>
                        <li><i class="bi bi-telephone"></i> (021) 1234567</li>
                        <li><i class="bi bi-envelope"></i> info@smkiu.sch.id</li>
                        <li><i class="bi bi-geo-alt"></i> Jakarta Pusat</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div>© {{ date('Y') }} SMK INFORMATIKA UTAMA. All rights reserved.</div>
                <div class="footer-version">
                    <i class="bi bi-info-circle"></i> 
                    E-Raport v{{ Illuminate\Foundation\Application::VERSION }}
                </div>
            </div>
        </div>
    </footer>
</body>
</html>