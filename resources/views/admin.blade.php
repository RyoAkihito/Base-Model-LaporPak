<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LaporPak</title>
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
<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 w-full z-10">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo atau Brand -->
            <a href="/" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition duration-300 flex items-center">
                LaporPak
            </a>
            <!-- Menu Navigasi -->

        </nav>
    </header>

    <div class="flex min-h-screen pt-20">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white p-5 space-y-4 fixed h-full">
            <h1 class="text-xl font-bold flex items-center">
                <i class="fas fa-user-shield mr-2"></i> Admin Panel
            </h1>
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard" class="block p-2 hover:bg-gray-700 rounded transition duration-300 items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/user" class="block p-2 hover:bg-gray-700 rounded transition duration-300 items-center">
                        <i class="fas fa-users mr-2"></i> Kelola User
                    </a>
                </li>
                <li>
                    <a href="/admin/petugas" class="block p-2 hover:bg-gray-700 rounded transition duration-300 items-center">
                        <i class="fas fa-user-tie mr-2"></i> Kelola Petugas
                    </a>
                </li>
                <li>
                    <a href="/logout" class="block p-2 hover:bg-red-600 rounded transition duration-300 items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Konten utama -->
        <main class="flex-1 p-6 ml-64">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-tachometer-alt mr-2 text-blue-500"></i> Dashboard Admin
            </h1>

            <!-- Statistik Laporan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-white shadow-lg rounded-lg animate-fade-in">
                    <h2 class="text-lg font-semibold text-gray-700">Total Laporan</h2>
                    <p class="text-2xl font-bold text-gray-800">120</p>
                </div>
                <div class="p-4 bg-white shadow-lg rounded-lg animate-fade-in" style="animation-delay: 0.2s;">
                    <h2 class="text-lg font-semibold text-gray-700">Laporan Selesai</h2>
                    <p class="text-2xl font-bold text-green-600">90</p>
                </div>
                <div class="p-4 bg-white shadow-lg rounded-lg animate-fade-in" style="animation-delay: 0.4s;">
                    <h2 class="text-lg font-semibold text-gray-700">Laporan Dalam Proses</h2>
                    <p class="text-2xl font-bold text-yellow-600">30</p>
                </div>
            </div>

            <!-- Tabel Laporan -->
            <div class="bg-white p-6 shadow-lg rounded-lg animate-fade-in">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-file-alt mr-2 text-blue-500"></i> Laporan Terbaru
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-200 p-3 text-left text-gray-700">No</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Judul</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border border-gray-200">
                                <td class="border border-gray-200 p-3">1</td>
                                <td class="border border-gray-200 p-3">Laporan AC Rusak</td>
                                <td class="border border-gray-200 p-3">
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>
                                </td>
                            </tr>
                            <tr class="border border-gray-200">
                                <td class="border border-gray-200 p-3">2</td>
                                <td class="border border-gray-200 p-3">Laporan Lampu Mati</td>
                                <td class="border border-gray-200 p-3">
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-700">
                                        Selesai
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

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

</body>
</html>