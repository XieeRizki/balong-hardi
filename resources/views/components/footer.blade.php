<footer class="bg-gray-600 text-white py-12 md:py-16 border-t border-gray-700">
    <div class="container-max">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 mb-12">
            <!-- Brand -->
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">BALONG HARDI</h3>
                        <p class="text-xs text-gray-300 font-inter">Pemancingan Sumedang</p>
                    </div>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Balong Hardi adalah tempat pemancingan terbaik di Sumedang dengan fasilitas lengkap, aman, dan nyaman untuk pengalaman memancing yang tak terlupakan.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Menu Cepat</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="/" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Home</a></li>
                    <li><a href="#tentang" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Tentang Kami</a></li>
                    <li><a href="#fasilitas" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Fasilitas</a></li>
                    <li><a href="#harga" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Harga</a></li>
                    <li><a href="#testimoni" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Testimoni</a></li>
                </ul>
            </div>

            <!-- Fasilitas -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Fasilitas Kami</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Kolam Pemancingan</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Restoran</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Parkir Luas</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-primary-light transition-colors duration-300 font-medium">Mushollah</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Kontak</h4>
                <ul class="space-y-3 text-sm">
                    <li class="text-gray-300 font-medium">📞 {{ $contact?->phone ?? 'Hubungi kami' }}</li>
                    <li class="text-gray-300 font-medium">📍 {{ $contact?->address ?? 'Sumedang, Jawa Barat' }}</li>
                    <li class="text-gray-300 font-medium">⏰ Buka 24 Jam</li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700"></div>

        <!-- Bottom Footer -->
        <div class="mt-8 pt-8 grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
            <p class="text-gray-300 text-sm">
                &copy; 2024 Balong Hardi Sumedang. Semua hak dilindungi.
            </p>
            <div class="flex justify-start md:justify-end space-x-6">
                <a href="#" class="text-gray-300 hover:text-primary-light transition-colors duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition-colors duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 9 0 11-4s1-8.3 0-11.6z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>
