<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Balong Hardi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary: #ff8c42;
            --secondary: #1a3a52;
            --light: #f5f5f5;
            --dark: #2c3e50;
        }
    </style>
</head>
<body class="bg-light">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-secondary text-white shadow-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Balong Hardi</h1>
                <p class="text-gray-400 text-sm">Admin Panel</p>
            </div>

            <nav class="mt-8">
                <a href="{{ route('admin.facility.index') }}" class="block px-6 py-3 hover:bg-primary transition-all {{ request()->routeIs('admin.facility.*') ? 'bg-primary' : '' }}">
                    🏢 Fasilitas
                </a>
                <a href="{{ route('admin.package.index') }}" class="block px-6 py-3 hover:bg-primary transition-all {{ request()->routeIs('admin.package.*') ? 'bg-primary' : '' }}">
                    📦 Paket
                </a>
                <a href="{{ route('admin.blog-post.index') }}" class="block px-6 py-3 hover:bg-primary transition-all {{ request()->routeIs('admin.blog-post.*') ? 'bg-primary' : '' }}">
                    📝 Blog
                </a>
                <a href="{{ route('admin.testimonial.index') }}" class="block px-6 py-3 hover:bg-primary transition-all {{ request()->routeIs('admin.testimonial.*') ? 'bg-primary' : '' }}">
                    ⭐ Testimoni
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="block px-6 py-3 hover:bg-primary transition-all {{ request()->routeIs('admin.gallery.*') ? 'bg-primary' : '' }}">
                    🖼️ Galeri
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 border-t border-gray-700">
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full px-6 py-3 hover:bg-red-600 transition-all text-left">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <div class="p-8">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <h4 class="font-bold mb-2">Terjadi kesalahan:</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>