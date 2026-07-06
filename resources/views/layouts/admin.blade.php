<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Balong Hardi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF6B35;
            --secondary: #1a3a52;
            --accent: #00A8E8;
            --success: #06D6A0;
            --warning: #FFB703;
            --danger: #EF476F;
            --light: #F8F9FA;
            --dark: #1F2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }

        .sidebar {
            background: linear-gradient(135deg, var(--secondary) 0%, #0f2744 100%);
            color: white;
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 2px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .sidebar-header p {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.7);
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: rgba(255, 107, 53, 0.2);
            color: white;
            border-left-color: var(--primary);
            padding-left: 1.75rem;
        }

        .sidebar-nav a i {
            width: 1.5rem;
            margin-right: 0.75rem;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 1rem;
        }

        .sidebar-footer form {
            width: 100%;
        }

        .sidebar-footer button {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--danger);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .sidebar-footer button:hover {
            background-color: #d93859;
            transform: translateY(-2px);
        }

        main {
            margin-left: 280px;
            min-height: 100vh;
        }

        .header {
            background: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content {
            padding: 2rem;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background-color: rgba(6, 214, 160, 0.1);
            border-left: 4px solid var(--success);
            color: #047857;
        }

        .alert-danger {
            background-color: rgba(239, 71, 111, 0.1);
            border-left: 4px solid var(--danger);
            color: #991b1b;
        }

        .alert i {
            font-size: 1.25rem;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
                margin-left: -250px;
                transition: margin-left 0.3s ease;
            }

            main {
                margin-left: 0;
            }

            .content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>🏊 Balong Hardi</h1>
            <p>Admin Panel</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="{{ route('admin.facility.index') }}" class="{{ request()->routeIs('admin.facility.*') ? 'active' : '' }}">
                <i class="fas fa-swimming-pool"></i> Fasilitas
            </a>
            <a href="{{ route('admin.packages.index') }}" class="{{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                <i class="fas fa-tag"></i> Paket
            </a>
            <a href="{{ route('admin.blog-posts.index') }}" class="{{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}">
                <i class="fas fa-pen-fancy"></i> Blog
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Testimoni
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Galeri
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <main>
        <div class="header">
            <div>
                <h2 style="color: var(--secondary); font-size: 1.5rem;">@yield('title')</h2>
            </div>
        </div>

        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <strong>Terjadi kesalahan:</strong>
                        <ul style="margin-top: 0.5rem; margin-left: 1.5rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>
</html>