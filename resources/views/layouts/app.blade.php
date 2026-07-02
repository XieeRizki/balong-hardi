<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Balong Hardi Sumedang - Tempat Pemancingan Terbaik dengan Fasilitas Lengkap dan Harga Terjangkau.">
    <title>@yield('title', 'Balong Hardi Sumedang - Tempat Pemancingan')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F97316',
                        'primary-dark': '#EA580C',
                        'primary-light': '#FB923C',
                        secondary: '#1F2937',
                        'secondary-light': '#374151',
                        accent: '#FEF3C7',
                        'accent-dark': '#FCD34D',
                        dark: '#111827',
                        light: '#F9FAFB',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        * { font-family: 'Poppins', sans-serif; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #F97316; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #EA580C; }

        .container-max { max-width: 1280px; margin: 0 auto; padding: 0 1rem; }

        .menu-backdrop {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 39;
            animation: fadeIn 0.3s ease-in-out;
        }
        .menu-backdrop.active { display: block; }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .mobile-menu {
            position: fixed;
            right: -100%;
            top: 0;
            height: 100vh;
            width: 80%;
            max-width: 300px;
            background: white;
            z-index: 40;
            transition: right 0.3s ease-in-out;
            overflow-y: auto;
        }
        .mobile-menu.active { right: 0; }

        .card-modern {
            background: white;
            border-radius: 16px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-modern:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: translateY(-8px);
        }

        .gradient-primary {
            background: linear-gradient(135deg, #F97316 0%, #FB923C 100%);
        }
    </style>

    @yield('css')
</head>
<body class="bg-white">
    {{-- $contact diambil sekali di sini, dipass ke navbar/mobile-menu/footer
         biar gak query Contact::first() berkali-kali di tiap komponen --}}
    @php
        $contact = $contact ?? \App\Models\Contact::first();
    @endphp

    <x-navbar :contact="$contact" />
    <x-mobile-menu :contact="$contact" />

    <div id="menuBackdrop" class="menu-backdrop"></div>

    <main>
        @yield('content')
    </main>

    <x-footer :contact="$contact" />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const menuBackdrop = document.getElementById('menuBackdrop');
            const closeMenuBtn = document.getElementById('closeMenuBtn');

            const openMenu = () => {
                mobileMenu.classList.add('active');
                menuBackdrop.classList.add('active');
            };
            const closeMenu = () => {
                mobileMenu.classList.remove('active');
                menuBackdrop.classList.remove('active');
            };

            menuBtn?.addEventListener('click', openMenu);
            closeMenuBtn?.addEventListener('click', closeMenu);
            menuBackdrop?.addEventListener('click', closeMenu);
            mobileMenu?.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
        });
    </script>

    @yield('js')
</body>
</html>
