@extends('layouts.app')

@section('title', 'Home - Balong Hardi Sumedang | Tempat Pemancingan Terbaik')

@section('content')

<!-- Hero Section -->
<section class="pt-20 pb-16 md:pt-32 md:pb-24 bg-gradient-to-br from-secondary via-secondary-light to-dark text-white overflow-hidden relative">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 right-10 w-96 h-96 bg-primary rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-96 h-96 bg-primary rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    
    <div class="container-max relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="text-center md:text-left">
                <div class="inline-block mb-6 px-4 py-2 bg-primary bg-opacity-20 rounded-full">
                    <p class="text-primary font-semibold text-sm">🎣 Tempat Memancing Terbaik</p>
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Nikmati Pengalaman <span class="text-primary">Memancing</span> Terbaik
                </h1>
                <p class="text-lg md:text-xl text-gray-300 mb-8 leading-relaxed max-w-lg">
                    Balong Hardi Sumedang menyediakan tempat pemancingan dengan kolam yang luas, ikan yang melimpah, dan fasilitas lengkap untuk kenyamanan Anda.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6281234567890" class="px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all duration-300 flex items-center justify-center space-x-2 hover:shadow-2xl hover:-translate-y-1">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.782 1.14c-1.557.821-2.982 2.053-4.099 3.55A9.932 9.932 0 002.33 12a9.945 9.945 0 001.692-5.175c1.117-1.497 2.542-2.729 4.099-3.55a9.87 9.87 0 014.782-1.14h.005c3.26 0 6.263 1.333 8.418 3.488 2.155 2.155 3.488 5.158 3.488 8.418 0 3.26-1.333 6.263-3.488 8.418-2.155 2.155-5.158 3.488-8.418 3.488s-6.263-1.333-8.418-3.488C3.334 18.263 2 15.26 2 12s1.333-6.263 3.488-8.418c2.155-2.155 5.158-3.488 8.418-3.488m0-1.4c-3.592 0-6.852 1.462-9.206 3.816C2.833 5.148 1.371 8.408 1.371 12s1.462 6.852 3.816 9.206c2.354 2.354 5.614 3.816 9.206 3.816s6.852-1.462 9.206-3.816c2.354-2.354 3.816-5.614 3.816-9.206s-1.462-6.852-3.816-9.206c-2.354-2.354-5.614-3.816-9.206-3.816"></path>
                        </svg>
                        <span>Hubungi Sekarang</span>
                    </a>
                    <a href="#fasilitas" class="px-8 py-4 border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-secondary transition-all duration-300 flex items-center justify-center space-x-2">
                        <span>Lihat Fasilitas</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Image/Stats -->
            <div class="hidden md:flex items-center justify-center">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-8 border border-white border-opacity-20 text-center hover:bg-opacity-20 transition-all duration-300">
                        <p class="text-4xl font-bold text-primary mb-2">2000+</p>
                        <p class="text-gray-300 text-sm font-medium">Pengunjung/Bulan</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-8 border border-white border-opacity-20 text-center hover:bg-opacity-20 transition-all duration-300">
                        <p class="text-4xl font-bold text-primary mb-2">5 Ha</p>
                        <p class="text-gray-300 text-sm font-medium">Luas Kolam</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-8 border border-white border-opacity-20 text-center hover:bg-opacity-20 transition-all duration-300">
                        <p class="text-4xl font-bold text-primary mb-2">4.8★</p>
                        <p class="text-gray-300 text-sm font-medium">Rating</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-8 border border-white border-opacity-20 text-center hover:bg-opacity-20 transition-all duration-300">
                        <p class="text-4xl font-bold text-primary mb-2">15+</p>
                        <p class="text-gray-300 text-sm font-medium">Tahun Berdiri</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Kami Section -->
<section id="tentang" class="py-20 md:py-32 bg-white">
    <div class="container-max">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Image -->
            <div class="order-2 md:order-1">
                <div class="relative h-96 md:h-[550px] rounded-3xl overflow-hidden shadow-2xl">
                    <img 
                        src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=700&fit=crop" 
                        alt="Kolam Pemancingan Balong Hardi" 
                        class="w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
            </div>

            <!-- Content -->
            <div class="order-1 md:order-2">
                <div class="mb-6">
                    <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider">Tentang Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-8 leading-tight">
                    Balong Hardi, Tempat Memancing Legendaris Sumedang
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Balong Hardi Sumedang telah melayani para penggemar memancing selama lebih dari 15 tahun. Kami berkomitmen untuk memberikan pengalaman memancing terbaik dengan menjaga kebersihan kolam, menyediakan ikan berkualitas, dan fasilitas yang lengkap.
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Dengan luas kolam 5 hektar dan stok ikan yang selalu terjaga, Balong Hardi menjadi pilihan utama para pemancingan di Sumedang dan sekitarnya. Kami juga rutin mengadakan turnamen memancing untuk komunitas pemancingan lokal.
                </p>

                <!-- Benefits List -->
                <div class="space-y-4 mb-10">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-secondary text-lg">Kolam Luas & Terawat</h4>
                            <p class="text-gray-600 text-sm">5 hektar dengan kolam yang selalu bersih dan terawat</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-secondary text-lg">Stok Ikan Melimpah</h4>
                            <p class="text-gray-600 text-sm">Ikan mas, bawal, nila berkualitas premium selalu tersedia</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-secondary text-lg">Harga Terjangkau</h4>
                            <p class="text-gray-600 text-sm">Paket memancing yang bersahabat untuk semua kalangan</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-block px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas Section -->
<section id="fasilitas" class="py-20 md:py-32 bg-light">
    <div class="container-max">
        <div class="text-center mb-16 md:mb-20">
            <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">Fasilitas Kami</span>
            <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-6">Lengkap & Nyaman</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Semua yang Anda butuhkan untuk pengalaman memancing yang maksimal</p>
        </div>

        <!-- Facilities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Facility 1 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400&h=300&fit=crop" 
                        alt="Kolam Pemancingan" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Kolam Pemancingan</h3>
                    <p class="text-gray-600 leading-relaxed">Kolam dengan luas 5 hektar yang terawat dengan baik dan penuh dengan berbagai jenis ikan berkualitas premium.</p>
                </div>
            </div>

            <!-- Facility 2 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1504674900304-7a58e53d8cde?w=400&h=300&fit=crop" 
                        alt="Warung Makan" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 9H9V2H7v7H5V2H3v7c0 2.55 1.92 4.63 4.39 4.94V22h2.42v-8.06C11.05 13.63 13 11.55 13 9v-7h-2v7zm6-7h-2v7h2V2zm0 11h-2v9h2v-9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Warung Makan</h3>
                    <p class="text-gray-600 leading-relaxed">Warung dengan menu lengkap menyediakan minuman segar dan makanan untuk menemani waktu memancing Anda.</p>
                </div>
            </div>

            <!-- Facility 3 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=400&h=300&fit=crop" 
                        alt="Kamar Mandi" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5s-5 2.24-5 5v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6-2c1.66 0 3 1.34 3 3v2H9V6c0-1.66 1.34-3 3-3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Kamar Mandi</h3>
                    <p class="text-gray-600 leading-relaxed">Fasilitas kamar mandi yang bersih dan lengkap untuk kenyamanan Anda setelah memancing seharian.</p>
                </div>
            </div>

            <!-- Facility 4 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1464207687429-7505649dae38?w=400&h=300&fit=crop" 
                        alt="Area Parkir" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H6V4h12v16zm-5.04-6.71l-2.75 3.54-1.3-1.54c-.39-.48-1.02-.48-1.41 0-.39.49-.39 1.28 0 1.77l2 2.34c.39.48 1.02.48 1.41 0l3.83-4.87c.39-.49.39-1.28 0-1.77-.39-.48-1.02-.48-1.41 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Area Parkir Luas</h3>
                    <p class="text-gray-600 leading-relaxed">Parkir yang luas dan aman dengan sistem pengamanan 24 jam untuk kendaraan Anda.</p>
                </div>
            </div>

            <!-- Facility 5 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1562480947-230b5c3b2fa4?w=400&h=300&fit=crop" 
                        alt="WiFi" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4c-1.48 0-2.85.43-4.01 1.17l1.46 1.46C10.21 5.23 11.08 5 12 5c3.04 0 5.5 2.46 5.5 5.5v.5H19c1.66 0 3 1.34 3 3 0 1.13-.64 2.11-1.56 2.62l1.45 1.45c.45-.34.85-.75 1.19-1.22.99-1.62 1.63-3.55 1.63-5.65-.02-1.8-.35-3.51-.99-5.11zM19 13h-4V9h-2v4h-4l5 5 5-5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">WiFi Gratis</h3>
                    <p class="text-gray-600 leading-relaxed">Nikmati WiFi gratis untuk tetap terhubung atau mengabadikan momen memancing Anda.</p>
                </div>
            </div>

            <!-- Facility 6 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=300&fit=crop" 
                        alt="Pemandu" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Pemandu Profesional</h3>
                    <p class="text-gray-600 leading-relaxed">Tim pemandu berpengalaman siap membantu dan memberikan tips memancing untuk pemula.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="harga" class="py-20 md:py-32 bg-white">
    <div class="container-max">
        <div class="text-center mb-16 md:mb-20">
            <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">Paket & Harga</span>
            <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-6">Paket Terjangkau</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Pilih paket yang sesuai dengan kebutuhan dan budget Anda</p>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto mb-12">
            <!-- Paket 1 -->
            <div class="card-modern p-8 flex flex-col">
                <h3 class="text-2xl font-bold text-secondary mb-2">Paket Pagi</h3>
                <p class="text-gray-600 text-sm mb-6">06:00 - 12:00 (6 jam)</p>
                <p class="text-5xl font-bold text-primary mb-8"><span class="text-3xl">Rp</span> 50K <span class="text-lg text-gray-600">/orang</span></p>
                
                <ul class="space-y-4 mb-auto">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Akses kolam penuh</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">WiFi gratis</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Akses kamar mandi</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Parkir gratis</span>
                    </li>
                </ul>

                <a href="https://wa.me/6281234567890" class="w-full px-6 py-3 border-2 border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-all duration-300 text-center mt-8">
                    Pesan Sekarang
                </a>
            </div>

            <!-- Paket 2 (Recommended) -->
            <div class="card-modern p-8 flex flex-col ring-2 ring-primary shadow-2xl transform scale-105">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-primary text-white px-4 py-1.5 rounded-full text-sm font-bold">
                    Paling Populer
                </div>
                <h3 class="text-2xl font-bold text-secondary mb-2 mt-2">Paket Siang</h3>
                <p class="text-gray-600 text-sm mb-6">12:00 - 18:00 (6 jam)</p>
                <p class="text-5xl font-bold text-primary mb-8"><span class="text-3xl">Rp</span> 60K <span class="text-lg text-gray-600">/orang</span></p>
                
                <ul class="space-y-4 mb-auto">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Akses kolam penuh</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Makan siang gratis</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">WiFi gratis</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Pemandu profesional</span>
                    </li>
                </ul>

                <a href="https://wa.me/6281234567890" class="w-full px-6 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all duration-300 text-center mt-8 shadow-lg">
                    Pesan Sekarang
                </a>
            </div>

            <!-- Paket 3 -->
            <div class="card-modern p-8 flex flex-col">
                <h3 class="text-2xl font-bold text-secondary mb-2">Paket Sore</h3>
                <p class="text-gray-600 text-sm mb-6">06:00 - 18:00 (12 jam)</p>
                <p class="text-5xl font-bold text-primary mb-8"><span class="text-3xl">Rp</span> 100K <span class="text-lg text-gray-600">/orang</span></p>
                
                <ul class="space-y-4 mb-auto">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Akses kolam penuh</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Makan siang + snack</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">WiFi & parkir gratis</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Pemandu & asuransi</span>
                    </li>
                </ul>

                <a href="https://wa.me/6281234567890" class="w-full px-6 py-3 border-2 border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-all duration-300 text-center mt-8">
                    Pesan Sekarang
                </a>
            </div>
        </div>

        <!-- Promo Banner -->
        <div class="bg-gradient-primary rounded-3xl p-8 md:p-16 text-white text-center max-w-4xl mx-auto">
            <h3 class="text-3xl md:text-4xl font-bold mb-4">🎉 Promosi Spesial!</h3>
            <p class="text-lg text-white text-opacity-90 mb-8">Diskon 20% untuk grup minimal 10 orang</p>
            <a href="https://wa.me/6281234567890" class="inline-block px-8 py-4 bg-white text-primary font-bold rounded-xl hover:bg-opacity-90 transition-all duration-300 shadow-lg">
                Hubungi Kami untuk Penawaran Grup
            </a>
        </div>
    </div>
</section>

<!-- Testimoni Section -->
<section id="testimoni" class="py-20 md:py-32 bg-light">
    <div class="container-max">
        <div class="text-center mb-16 md:mb-20">
            <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">Testimoni</span>
            <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-6">Pengalaman Pengunjung</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Dengarkan cerita dari pengunjung setia Balong Hardi</p>
        </div>

        <!-- Testimonial Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Testimonial 1 -->
            <div class="card-modern p-8">
                <div class="flex items-center mb-4 space-x-1">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">"Balong Hardi adalah tempat memancing terbaik di Sumedang. Kolam luas, ikan banyak, dan harga terjangkau. Saya sudah datang berkali-kali!"</p>
                <div class="flex items-center space-x-3">
                    <img 
                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop&crop=faces" 
                        alt="Budi Hermawan" 
                        class="w-12 h-12 rounded-full object-cover"
                    >
                    <div>
                        <p class="font-bold text-secondary">Budi Hermawan</p>
                        <p class="text-sm text-gray-600">Sumedang</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="card-modern p-8">
                <div class="flex items-center mb-4 space-x-1">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">"Pelayanan yang sangat baik, pemandu yang ramah, dan fasilitas yang lengkap. Puas banget memancing di sini bersama keluarga!"</p>
                <div class="flex items-center space-x-3">
                    <img 
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50&h=50&fit=crop&crop=faces" 
                        alt="Rini Suryani" 
                        class="w-12 h-12 rounded-full object-cover"
                    >
                    <div>
                        <p class="font-bold text-secondary">Rini Suryani</p>
                        <p class="text-sm text-gray-600">Bandung</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="card-modern p-8">
                <div class="flex items-center mb-4 space-x-1">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <p class="text-gray-700 mb-6 leading-relaxed italic">"Rekomendasi terbaik untuk mereka yang menyukai memancing. Harga kompetitif dan hasil tangkapan yang memuaskan setiap kali berkunjung."</p>
                <div class="flex items-center space-x-3">
                    <img 
                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=50&h=50&fit=crop&crop=faces" 
                        alt="Ahmad Hidayat" 
                        class="w-12 h-12 rounded-full object-cover"
                    >
                    <div>
                        <p class="font-bold text-secondary">Ahmad Hidayat</p>
                        <p class="text-sm text-gray-600">Garut</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-20 md:py-32 bg-white">
    <div class="container-max">
        <div class="text-center mb-16 md:mb-20">
            <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">Blog & Tips</span>
            <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-6">Tips & Artikel Memancing</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Pelajari tips memancing, teknik, dan cerita menarik dari para penggemar memancing</p>
        </div>

        <!-- Blog Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Blog Card 1 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden bg-gray-200">
                    <img 
                        src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400&h=300&fit=crop" 
                        alt="Tips Memancing Pagi" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-6">
                    <p class="text-sm text-primary font-bold mb-3 uppercase tracking-wider">Tips Memancing</p>
                    <h3 class="text-xl font-bold text-secondary mb-3 group-hover:text-primary transition-colors duration-300">5 Tips Memancing Pagi yang Efektif</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">Pelajari teknik dan strategi memancing di pagi hari untuk mendapatkan hasil tangkapan yang maksimal.</p>
                    <a href="#" class="text-primary font-bold flex items-center space-x-2 hover:space-x-3 transition-all duration-300">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden bg-gray-200">
                    <img 
                        src="https://images.unsplash.com/photo-1504674900304-7a58e53d8cde?w=400&h=300&fit=crop" 
                        alt="Jenis Ikan" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-6">
                    <p class="text-sm text-accent-dark font-bold mb-3 uppercase tracking-wider">Jenis Ikan</p>
                    <h3 class="text-xl font-bold text-secondary mb-3 group-hover:text-primary transition-colors duration-300">Mengenal Jenis Ikan di Balong Hardi</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">Informasi lengkap tentang jenis-jenis ikan yang ada di Balong Hardi dan cara menangkapnya.</p>
                    <a href="#" class="text-primary font-bold flex items-center space-x-2 hover:space-x-3 transition-all duration-300">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="card-modern overflow-hidden group">
                <div class="relative h-48 overflow-hidden bg-gray-200">
                    <img 
                        src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop" 
                        alt="Cerita Memancing" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-30"></div>
                </div>
                <div class="p-6">
                    <p class="text-sm text-secondary font-bold mb-3 uppercase tracking-wider">Cerita</p>
                    <h3 class="text-xl font-bold text-secondary mb-3 group-hover:text-primary transition-colors duration-300">Pengalaman Memancing Seru di Musim Hujan</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">Cerita menarik dari pengunjung tentang petualangan memancing di musim hujan dengan hasil luar biasa.</p>
                    <a href="#" class="text-primary font-bold flex items-center space-x-2 hover:space-x-3 transition-all duration-300">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="#" class="inline-block px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                Baca Semua Blog
            </a>
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="py-20 md:py-32 bg-light">
    <div class="container-max">
        <div class="text-center mb-16 md:mb-20">
            <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">Hubungi Kami</span>
            <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-6">Siap Membantu Anda</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Hubungi kami untuk reservasi, informasi lebih lanjut, atau pertanyaan seputar Balong Hardi</p>
        </div>

        <!-- Contact Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16">
            <!-- Contact Form -->
            <div>
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-secondary mb-3">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama Anda" class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-300">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-secondary mb-3">Email</label>
                        <input type="email" placeholder="Masukkan email Anda" class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-300">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-secondary mb-3">Nomor WhatsApp</label>
                        <input type="tel" placeholder="+62 812 3456 7890" class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-300">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-secondary mb-3">Paket yang Diinginkan</label>
                        <select class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-300">
                            <option>Pilih paket...</option>
                            <option>Paket Pagi - Rp 50K</option>
                            <option>Paket Siang - Rp 60K</option>
                            <option>Paket Sore - Rp 100K</option>
                            <option>Paket Grup</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-secondary mb-3">Pesan</label>
                        <textarea placeholder="Tuliskan pesan Anda..." rows="5" class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-opacity-20 transition-all duration-300 resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-all duration-300 active:scale-95 shadow-lg">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-6">
                <div class="card-modern p-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-primary rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-secondary mb-2">Telepon</h4>
                            <p class="text-gray-600 font-medium">+62 812 3456 7890</p>
                            <p class="text-gray-600 font-medium">+62 265 1234 5678</p>
                        </div>
                    </div>
                </div>

                <div class="card-modern p-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-primary rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.782 1.14c-1.557.821-2.982 2.053-4.099 3.55A9.932 9.932 0 002.33 12a9.945 9.945 0 001.692-5.175c1.117-1.497 2.542-2.729 4.099-3.55a9.87 9.87 0 014.782-1.14h.005c3.26 0 6.263 1.333 8.418 3.488 2.155 2.155 3.488 5.158 3.488 8.418 0 3.26-1.333 6.263-3.488 8.418-2.155 2.155-5.158 3.488-8.418 3.488s-6.263-1.333-8.418-3.488C3.334 18.263 2 15.26 2 12s1.333-6.263 3.488-8.418c2.155-2.155 5.158-3.488 8.418-3.488m0-1.4c-3.592 0-6.852 1.462-9.206 3.816C2.833 5.148 1.371 8.408 1.371 12s1.462 6.852 3.816 9.206c2.354 2.354 5.614 3.816 9.206 3.816s6.852-1.462 9.206-3.816c2.354-2.354 3.816-5.614 3.816-9.206s-1.462-6.852-3.816-9.206c-2.354-2.354-5.614-3.816-9.206-3.816"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-secondary mb-2">WhatsApp</h4>
                            <a href="https://wa.me/6281234567890" class="text-primary hover:text-primary-dark transition-colors duration-300 font-bold">+62 812 3456 7890</a>
                            <p class="text-gray-600 text-sm mt-1 font-medium">Respons cepat 24/7</p>
                        </div>
                    </div>
                </div>

                <div class="card-modern p-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-primary rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-secondary mb-2">Alamat</h4>
                            <p class="text-gray-600 font-medium">Jln. Raya Sumedang - Cirebon</p>
                            <p class="text-gray-600 font-medium">Sumedang, Jawa Barat</p>
                        </div>
                    </div>
                </div>

                <div class="card-modern p-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-primary rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-secondary mb-2">Jam Operasional</h4>
                            <p class="text-gray-600 font-medium">Senin - Minggu</p>
                            <p class="text-gray-600 font-bold">06:00 - 18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="h-96 md:h-[500px] bg-gray-300 relative overflow-hidden">
    <img 
        src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=1200&h=600&fit=crop" 
        alt="Peta Lokasi Balong Hardi" 
        class="w-full h-full object-cover"
    >
    <div class="absolute inset-0 bg-gradient-to-br from-black to-transparent opacity-40"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center z-10">
            <svg class="w-20 h-20 text-white mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <p class="text-white font-bold text-lg drop-shadow-lg">Lokasi Balong Hardi</p>
            <p class="text-white text-opacity-90 text-sm drop-shadow-lg">Jln. Raya Sumedang - Cirebon, Sumedang, Jawa Barat</p>
            <a href="https://maps.google.com/?q=Balong+Hardi+Sumedang" target="_blank" class="inline-block mt-4 px-6 py-3 bg-white text-primary font-bold rounded-xl hover:bg-opacity-90 transition-all duration-300 shadow-lg">
                Buka di Maps
            </a>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-20 md:py-32 bg-gradient-primary text-white">
    <div class="container-max">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Memancing?</h2>
            <p class="text-lg md:text-xl text-white text-opacity-90 mb-10 leading-relaxed">
                Jangan tunda lagi! Kunjungi Balong Hardi sekarang dan nikmati pengalaman memancing terbaik dengan fasilitas lengkap dan harga terjangkau.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281234567890" class="px-8 py-4 bg-white text-primary font-bold rounded-xl hover:bg-opacity-90 transition-all duration-300 flex items-center justify-center space-x-2 hover:shadow-2xl shadow-lg hover:-translate-y-1">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.782 1.14c-1.557.821-2.982 2.053-4.099 3.55A9.932 9.932 0 002.33 12a9.945 9.945 0 001.692-5.175c1.117-1.497 2.542-2.729 4.099-3.55a9.87 9.87 0 014.782-1.14h.005c3.26 0 6.263 1.333 8.418 3.488 2.155 2.155 3.488 5.158 3.488 8.418 0 3.26-1.333 6.263-3.488 8.418-2.155 2.155-5.158 3.488-8.418 3.488s-6.263-1.333-8.418-3.488C3.334 18.263 2 15.26 2 12s1.333-6.263 3.488-8.418c2.155-2.155 5.158-3.488 8.418-3.488m0-1.4c-3.592 0-6.852 1.462-9.206 3.816C2.833 5.148 1.371 8.408 1.371 12s1.462 6.852 3.816 9.206c2.354 2.354 5.614 3.816 9.206 3.816s6.852-1.462 9.206-3.816c2.354-2.354 3.816-5.614 3.816-9.206s-1.462-6.852-3.816-9.206c-2.354-2.354-5.614-3.816-9.206-3.816"></path>
                    </svg>
                    <span>Chat via WhatsApp</span>
                </a>
                <a href="#kontak" class="px-8 py-4 border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-primary transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

@endsection