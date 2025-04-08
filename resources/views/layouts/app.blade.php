<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'LaporPak')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- CSRF Token untuk keamanan form Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header / Navbar -->
        <header class="bg-white shadow fixed top-0 w-full z-10">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <!-- Logo atau Brand -->
                <a href="/" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition duration-300 flex items-center">
                    LaporPak
                </a>
                <!-- Tombol Kembali -->
                <div class="space-x-6">
                    <a href="{{ url('/') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </nav>
        </header>

        <!-- Konten Utama -->
        <main class="pt-20 flex-grow">
            <!-- Flash Message -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg container mx-auto px-6">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg container mx-auto px-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Konten Dinamis -->
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto px-6 text-center">
                <p>© {{ date('Y') }} LaporPak. All rights reserved.</p>
                <div class="mt-2 flex justify-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-github"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>