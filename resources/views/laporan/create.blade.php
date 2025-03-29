@extends('layouts.app')

@section('title', 'Buat Laporan Baru')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center">
        <i class="fas fa-plus-circle mr-2 text-blue-500"></i> Buat Laporan Baru
    </h2>

    <!-- Form -->
    <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama -->
        <div>
            <label for="nama" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-user mr-1"></i> Nama
            </label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('nama') @enderror" required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-envelope mr-1"></i> Email
            </label>
            <input type="email" name="email" id="email" placeholder="Masukkan email Anda" value="{{ old('email') }}"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('email') @enderror" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Judul -->
        <div>
            <label for="judul" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-heading mr-1"></i> Judul
            </label>
            <input type="text" name="judul" id="judul" placeholder="Masukkan judul laporan" value="{{ old('judul') }}"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('judul') @enderror
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-align-left mr-1"></i> Deskripsi
            </label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Jelaskan detail laporan Anda" rows="4"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('deskripsi') @enderror" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Lokasi -->
        <div>
            <label for="lokasi" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-map-marker-alt mr-1"></i> Lokasi
            </label>
            <input type="text" name="lokasi" id="lokasi" placeholder="Masukkan lokasi kejadian" value="{{ old('lokasi') }}"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('lokasi') @enderror" required>
            @error('lokasi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto Bukti -->
        <div>
            <label for="foto_bukti" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-camera mr-1"></i> Foto Bukti (Opsional)
            </label>
            <input type="file" name="foto_bukti" id="foto_bukti" accept="image/*"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('foto_bukti') @enderror">
            <div id="imagePreview" class="mt-2 hidden">
                <img id="previewImage" src="#" alt="Pratinjau Gambar" class="max-w-full h-auto rounded-lg">
            </div>
            @error('foto_bukti')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label for="kategori" class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-tag mr-1"></i> Kategori
            </label>
            <select name="kategori" id="kategori"
                class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 @error('kategori') @enderror">
                <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                <option value="Pelayanan Publik" {{ old('kategori') == 'Pelayanan Publik' ? 'selected' : '' }}>Pelayanan Publik</option>
                <option value="Lingkungan" {{ old('kategori') == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                <option value="Transportasi" {{ old('kategori') == 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('kategori')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ url('/laporan') }}"
                class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Batal
            </a>
            <button type="submit" id="submitButton"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                <i class="fas fa-paper-plane mr-2"></i> Kirim Laporan
                <svg id="loadingSpinner" class="animate-spin h-5 w-5 ml-2 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

<!-- JavaScript untuk Pratinjau Gambar dan Loading Spinner -->
<script>
    // Pratinjau Gambar
    document.getElementById('foto_bukti').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('hidden');
        }
    });

    // Loading Spinner
    document.getElementById('laporanForm').addEventListener('submit', function() {
        const submitButton = document.getElementById('submitButton');
        const loadingSpinner = document.getElementById('loadingSpinner');
        submitButton.disabled = true;
        loadingSpinner.classList.remove('hidden');
    });
</script>
@endsection