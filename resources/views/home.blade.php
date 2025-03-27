<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - WebsiteKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi sederhana untuk elemen */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        /* Efek hover untuk card */
        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 sticky top-0 shadow-lg z-10">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-tight">WebsiteKu</h1>
            <div class="flex items-center space-x-6">
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:underline hover:text-blue-200 transition-colors">Home</a></li>
                    <li><a href="#" class="hover:underline hover:text-blue-200 transition-colors">Tentang</a></li>
                    <li><a href="#" class="hover:underline hover:text-blue-200 transition-colors">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-24 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
        <div class="container mx-auto animate-fade-in">
            <h2 class="text-5xl font-extrabold tracking-tight">Selamat Datang di WebsiteKu</h2>
            <p class="mt-4 text-xl max-w-2xl mx-auto">Tempat terbaik untuk mendapatkan informasi terkini dengan pengalaman pengguna yang luar biasa.</p>
            <a href="#" class="mt-8 inline-block bg-white text-blue-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-colors shadow-lg">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </section>

    <!-- Konten -->
    <section class="container mx-auto p-6 md:py-16">
        <h3 class="text-3xl font-bold text-center mb-12 animate-fade-in">Fitur Utama</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 shadow-lg rounded-xl text-center card-hover animate-fade-in">
                <svg class="w-12 h-12 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h4 class="text-xl font-semibold">Cepat & Responsif</h4>
                <p class="mt-3 text-gray-600">Website ini dirancang untuk kecepatan dan kemudahan akses di semua perangkat.</p>
            </div>
            <div class="bg-white p-6 shadow-lg rounded-xl text-center card-hover animate-fade-in" style="animation-delay: 0.2s;">
                <svg class="w-12 h-12 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h4 class="text-xl font-semibold">Desain Modern</h4>
                <p class="mt-3 text-gray-600">Menggunakan teknologi terbaru dengan tampilan yang elegan dan menarik.</p>
            </div>
            <div class="bg-white p-6 shadow-lg rounded-xl text-center card-hover animate-fade-in" style="animation-delay: 0.4s;">
                <svg class="w-12 h-12 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <h4 class="text-xl font-semibold">Mudah Digunakan</h4>
                <p class="mt-3 text-gray-600">Navigasi yang intuitif untuk pengalaman pengguna terbaik.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-16">
        <p class="text-sm">&copy; 2025 WebsiteKu. Semua Hak Dilindungi.</p>
    </footer>

</body>
</html>