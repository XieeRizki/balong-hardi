<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Balong Hardi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #F97316;
            --primary-dark: #EA580C;
            --secondary: #1F2937;
            --neutral: #6B7280;
            --border: #E5E7EB;
            --bg-light: #F9FAFB;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
        }

        html, body {
            height: 100%;
        }

        body {
            background-color: var(--bg-light);
            color: var(--secondary);
        }

        /* Layout */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, var(--secondary) 0%, #111827 100%);
            color: white;
            overflow-y: auto;
            position: fixed;
            height: 100vh;
            z-index: 1000;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand h1 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 0.25rem 0;
            color: var(--primary);
        }

        .sidebar-brand p {
            font-size: 0.75rem;
            opacity: 0.7;
            margin: 0;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
            margin: 0.25rem 0;
        }

        .sidebar-menu a:hover {
            background: rgba(249, 115, 22, 0.1);
            color: white;
            border-left-color: var(--primary);
            padding-left: 1.5rem;
        }

        .sidebar-menu a.active {
            background: rgba(249, 115, 22, 0.15);
            color: var(--primary);
            border-left-color: var(--primary);
            font-weight: 600;
        }

        .sidebar-menu i {
            width: 1.25rem;
            text-align: center;
            font-size: 0.95rem;
        }

        .sidebar-logout {
            position: absolute;
            bottom: 1rem;
            width: calc(100% - 2rem);
            left: 1rem;
        }

        .sidebar-logout form {
            width: 100%;
        }

        .sidebar-logout button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .sidebar-logout button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
        }

        .content {
            padding: 2rem;
        }

        /* Heading di dalam content biar ga ke-reset polos */
        .content h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .content p {
            margin-bottom: 1rem;
        }

        /* Alert */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            animation: slideDown 0.3s ease;
            border-left: 4px solid;
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
            background: rgba(16, 185, 129, 0.1);
            border-left-color: var(--success);
            color: #047857;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-left-color: var(--danger);
            color: #7F1D1D;
        }

        .alert i {
            font-size: 1rem;
            margin-top: 0.15rem;
        }

        /* Mobile */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1001;
        }

        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                max-height: 60px;
                overflow: visible;
                display: flex;
                align-items: center;
                padding: 0;
                z-index: 999;
            }

            .sidebar-brand {
                padding: 0.75rem 1.25rem;
                border-bottom: none;
                flex: 1;
                border-right: 1px solid rgba(255, 255, 255, 0.1);
            }

            .sidebar-brand h1 {
                font-size: 1rem;
                margin-bottom: 0;
            }

            .sidebar-brand p {
                display: none;
            }

            .sidebar-menu {
                display: none;
                position: absolute;
                top: 60px;
                left: 0;
                right: 0;
                background: linear-gradient(135deg, var(--secondary) 0%, #111827 100%);
                flex-direction: column;
                width: 100%;
                padding: 0.5rem 0;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            }

            .sidebar-menu.active {
                display: flex;
            }

            .sidebar-menu a {
                margin: 0;
                padding: 0.75rem 1.25rem;
                border-left: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .sidebar-menu a:hover,
            .sidebar-menu a.active {
                background: rgba(249, 115, 22, 0.15);
                padding-left: 1.25rem;
            }

            .sidebar-logout {
                display: none;
            }

            .sidebar-toggle {
                display: flex;
                padding: 0 1.25rem;
            }

            .main-content {
                margin-left: 0;
                margin-top: 60px;
            }

            .content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h1>🏊 Balong</h1>
                <p>Admin</p>
            </div>

            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <nav class="sidebar-menu" id="sidebarMenu">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>

                <a href="{{ route('admin.hero.edit') }}" class="{{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                    <i class="fas fa-image"></i> Hero Banner
                </a>

                <a href="{{ route('admin.about.edit') }}" class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i> Tentang Kami
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

                <div style="margin: 0.75rem 1.25rem; border-top: 1px solid rgba(255,255,255,0.1);"></div>

                <a href="{{ route('admin.location.edit') }}" class="{{ request()->routeIs('admin.location.*') ? 'active' : '' }}">
                    <i class="fas fa-map-marker-alt"></i> Lokasi
                </a>

                <a href="{{ route('admin.contact.edit') }}" class="{{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                    <i class="fas fa-address-book"></i> Info Kontak
                </a>
            </nav>

            <div class="sidebar-logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i> <span style="font-size: 0.85rem;">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="main-content">
            <div class="content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Terjadi kesalahan:</strong>
                            <ul style="margin: 0.5rem 0 0 1.5rem; padding: 0;">
                                @foreach ($errors->all() as $error)
                                    <li style="font-size: 0.9rem;">{{ $error }}</li>
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
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarMenu = document.getElementById('sidebarMenu');

        sidebarToggle?.addEventListener('click', () => {
            sidebarMenu.classList.toggle('active');
        });

        // Close menu when clicking a link
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebarMenu.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>