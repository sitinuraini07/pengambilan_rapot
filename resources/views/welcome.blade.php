<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Raport - Professional School Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Modern CSS Reset & Vars */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        :root {
            --primary-h: 221;
            --primary-s: 83%;
            --primary-l: 53%;
            
            --bg-page: hsl(var(--primary-h), 50%, 98%);
            --bg-card: hsla(0, 0%, 100%, 0.7);
            --bg-glass: hsla(var(--primary-h), 100%, 99%, 0.6);
            
            --text-main: hsl(var(--primary-h), 40%, 15%);
            --text-soft: hsl(var(--primary-h), 20%, 45%);
            
            --accent: hsl(var(--primary-h), var(--primary-s), var(--primary-l));
            --accent-glow: hsla(var(--primary-h), var(--primary-s), var(--primary-l), 0.15);
            
            --border: hsla(var(--primary-h), 30%, 85%, 0.5);
            --border-glow: hsla(var(--primary-h), var(--primary-s), var(--primary-l), 0.3);
            
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-page);
            color: var(--text-main);
            overflow-x: hidden;
            line-height: 1.7;
        }

        /* Abstract Background Elements */
        .bg-shapes {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: -1;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            filter: blur(80px);
            opacity: 0.4;
            border-radius: 50%;
            animation: move 20s infinite alternate cubic-bezier(0.45, 0.05, 0.55, 0.95);
        }

        .shape-1 { width: 500px; height: 500px; background: var(--accent); top: -250px; left: -100px; }
        .shape-2 { width: 400px; height: 400px; background: #60a5fa; bottom: -100px; right: -50px; animation-duration: 25s; }

        @keyframes move {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, 50px) scale(1.1); }
        }

        /* Navbar */
        nav {
            position: absolute;
            top: 0; width: 100%;
            padding: 2.5rem 5%;
            display: flex;
            justify-content: flex-end;
            z-index: 50;
        }

        .nav-button {
            padding: 0.8rem 1.8rem;
            border-radius: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .btn-ghost {
            color: var(--text-soft);
            margin-right: 1rem;
        }

        .btn-ghost:hover {
            color: var(--accent);
            background: var(--accent-glow);
        }

        .btn-primary {
            background: var(--accent);
            color: white;
            box-shadow: 0 10px 20px var(--accent-glow);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px var(--accent-glow);
            filter: brightness(1.1);
        }

        /* Hero Container */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6rem 5% 4rem;
        }

        .hero-inner {
            width: 100%;
            max-width: 1200px;
            text-align: center;
        }

        /* Logo Area */
        .logo-container {
            margin-bottom: 2.5rem;
            display: inline-flex;
            position: relative;
        }

        .logo-glow {
            position: absolute;
            inset: -10px;
            background: var(--accent);
            filter: blur(25px);
            opacity: 0.2;
            border-radius: 35px;
            animation: pulse 4s infinite;
        }

        .logo-box {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, var(--accent) 0%, #1d4ed8 100%);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            z-index: 2;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.3; transform: scale(1.1); }
        }

        /* Typography */
        h1 {
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            letter-spacing: -2px;
        }

        h1 span {
            color: var(--accent);
            position: relative;
        }

        .subtitle {
            font-size: clamp(1.1rem, 2vw, 1.35rem);
            color: var(--text-soft);
            max-width: 750px;
            margin: 0 auto 3rem;
            font-weight: 500;
        }

        /* Glass Card - Search Section */
        .glass-card {
            background: var(--bg-glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: 35px;
            padding: 3.5rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s ease;
        }

        .glass-card:hover {
            border-color: var(--border-glow);
            box-shadow: var(--shadow-lg), 0 0 0 1px hsla(var(--primary-h), 100%, 50%, 0.1);
        }

        .search-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 1.5rem;
            align-items: end;
        }

        .form-field {
            text-align: left;
        }

        .form-field label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-soft);
            margin-bottom: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-left: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 1.1rem 1.4rem;
            font-size: 1rem;
            font-family: inherit;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px var(--accent-glow);
            background: white;
        }

        .btn-submit {
            height: 60px;
            border-radius: 18px;
            background: var(--accent);
            color: white;
            border: none;
            padding: 0 2.5rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px var(--accent-glow);
        }

        .btn-submit:hover {
            transform: scale(1.02);
            filter: brightness(1.1);
        }

        /* Stats Sub-cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: white;
            border-radius: 24px;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--accent);
        }

        .stat-icon {
            width: 50px; height: 50px;
            border-radius: 15px;
            background: var(--accent-glow);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .stat-text h4 { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.1rem; }
        .stat-text p { font-size: 0.85rem; color: var(--text-soft); }

        /* Footer Modern */
        footer {
            padding: 5rem 5% 3rem;
            background: white;
            border-top: 1px solid var(--border);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.5fr;
            gap: 4rem;
        }

        .footer-brand h3 {
            font-weight: 800;
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
            letter-spacing: -0.5px;
        }

        .footer-brand p {
            color: var(--text-soft);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .social {
            display: flex;
            gap: 0.75rem;
        }

        .social-link {
            width: 40px; height: 40px;
            border-radius: 12px;
            background: var(--bg-page);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-soft);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
            transform: translateY(-3px);
        }

        .footer-links h4 {
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .footer-links ul { list-style: none; }
        .footer-links li { margin-bottom: 0.8rem; }
        .footer-links a {
            text-decoration: none;
            color: var(--text-soft);
            font-size: 0.95rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--accent); }

        .footer-bottom {
            margin-top: 5rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-soft);
            font-size: 0.9rem;
        }

        /* Responsive Fixes */
        @media (max-width: 1024px) {
            .search-grid { grid-template-columns: 1fr 1fr; }
            .footer-content { grid-template-columns: 1fr 1fr; gap: 3rem; }
        }

        @media (max-width: 768px) {
            .hero { padding-top: 8rem; }
            .glass-card { padding: 2rem; }
            .search-grid { grid-template-columns: 1fr; }
            .stats-row { grid-template-columns: 1fr; }
            .nav-button { display: none; }
            .footer-content { grid-template-columns: 1fr; gap: 2.5rem; }
        }
    </style>
</head>
<body>
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <nav>
    @auth
        <a href="{{ url('/dashboard') }}" class="nav-button btn-primary">
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="nav-button btn-ghost">
            Login
        </a>

        <a href="{{ route('register') }}" class="nav-button btn-ghost">
            Register
        </a>
    @endauth
</nav>


    <main class="hero">
        <div class="hero-inner">
            <div class="logo-container">
                <div class="logo-glow"></div>
                <div class="logo-box">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
            </div>
            
            <p style="text-transform: uppercase; letter-spacing: 3px; font-weight: 800; color: var(--accent); margin-bottom: 1rem; font-size: 0.8rem;">
                Sistem Manajemen Akademik & Raport
            </p>
            <h1>E-Raport <span>Digital</span></h1>
            <p class="subtitle">Transformasi digital pendidikan melalui platform cerdas untuk akses informasi nilai, kehadiran, dan perkembangan akademik yang transparan.</p>


    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-brand">
                <h3>SMK INFORMATIKA UTAMA</h3>
                <p>Mencetak generasi unggul yang profesional, inovatif, dan berakhlak mulia di era digital.</p>
                <div class="social">
                    <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-link"><i class="bi bi-globe2"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Pengumuman</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>Legalitas</h4>
                <ul>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Hak Cipta</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>Lokasi</h4>
                <p style="font-size: 0.95rem; color: var(--text-soft);">
                    Jl. Raya Pendidikan Utama No. 88, Cluster Inovasi, Jakarta Selatan.<br><br>
                    <i class="bi bi-telephone"></i> (021) 500-1234
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <div>&copy; {{ date('Y') }} E-Raport Digital. Semua Hak Dilindungi.</div>
            <div>
                <i class="bi bi-code-slash ms-2"></i> High Performance System
            </div>
        </div>
    </footer>
</body>
</html>