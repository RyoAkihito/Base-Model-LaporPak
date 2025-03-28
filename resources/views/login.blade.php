<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - LaporPak</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Animasi sederhana untuk elemen */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased flex items-center justify-center min-h-screen">

    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 w-full z-10">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo atau Brand -->
            <a href="/" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition duration-300 flex items-center">
                LaporPak
            </a>
            <!-- Menu Navigasi -->
            <div class="space-x-6">
                <a href="/" class="text-gray-600 hover:text-blue-500 transition duration-300">Home</a>
                <a href="/laporan/create" class="text-gray-600 hover:text-blue-500 transition duration-300">Buat Laporan</a>
            </div>
        </nav>
    </header>

    <!-- Form Login -->
    <div class="container mx-auto px-6 py-24">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto animate-fade-in">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                <i class="fas fa-sign-in-alt mr-2 text-blue-500"></i> Login
            </h1>

            <!-- Pesan Error -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                    <ul class="mb-0 list-disc list-inside">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Login -->
            <form action="" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-envelope mr-1"></i> Email
                    </label>
                    <input type="email" value="{{ old('email') }}" name="email" id="email" placeholder="Masukkan email"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('email') @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-lock mr-1"></i> Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('password') @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" name="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                    <a href="#" class="text-gray-600 hover:text-blue-500 text-sm transition duration-300">Lupa Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>© {{ date('Y') }} LaporPak. All rights reserved.</p>
            <div class="mt-2 flex justify-center space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-github"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>