<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Balong Hardi Sumedang - Tempat Pemancingan Terbaik dengan Fasilitas Lengkap dan Harga Terjangkau.">
    <title>@yield('title', 'Balong Hardi Sumedang - Tempat Pemancingan')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#15803D',
                        'primary-dark': '#166534',
                        'primary-light': '#22C55E',
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
        ::-webkit-scrollbar-thumb { background: #15803D; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #166534; }

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

        .gradient-primary,
        .bg-gradient-primary {
            background: linear-gradient(135deg, #15803D 0%, #22C55E 100%);
        }

        /* 
            Animasi gelombang di hero: looping terus-menerus, gak bergantung
            sama scroll event (jadi dijamin selalu keliatan gerak).
            Trik loop-nya: svg lebar-nya 200% dari container (2x pattern wave
            yang sama persis), terus di-translateX -50% dari lebar svg itu
            sendiri = geser sejauh 1 pattern penuh -> pas nyampe situ, posisinya
            identik sama posisi awal, jadi keliatan nyambung mulus tanpa "patahan".
        */
        @keyframes wave-move {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }
        .wave-layer {
            animation-name: wave-move;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            will-change: transform;
        }
        .wave-back {
            animation-duration: 22s; /* lebih pelan = kesan gelombang jauh di belakang */
        }
        .wave-front {
            animation-duration: 12s;
            animation-direction: reverse; /* arah kebalikan biar keliatan gelombang saling silang */
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

    <!-- AOS JS & Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi AOS (Animasi Scroll)
            AOS.init({
                once: false, // false = animasi berulang tiap kali section masuk/keluar viewport
                mirror: true, // elemen animasi lagi juga pas discroll ke ATAS (bukan cuma pas ke bawah)
                offset: 50,
                duration: 800,
                easing: 'ease-out-cubic',
            });

            // Efek Parallax Ringan untuk Hero Banner
            // (Animasi gelombang sekarang jalan sendiri lewat CSS keyframe
            // di atas -- .wave-move -- gak perlu JS/scroll listener lagi,
            // jadi dijamin selalu bergerak dan lebih ringan buat browser.)
            window.addEventListener('scroll', function () {
                const scrolled = window.scrollY;

                const parallaxImg = document.querySelector('.parallax-img');
                if (parallaxImg) {
                    // Gambar akan bergeser ke bawah sedikit demi sedikit saat di-scroll
                    parallaxImg.style.transform = 'translateY(' + (scrolled * 0.4) + 'px)';
                }
            });
        });
    </script>

    @yield('js')
</body>
</html>