@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-list mr-2 text-blue-500"></i> Daftar Laporan
        </h2>

        <!-- Form Pencarian -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <form action="{{ route('daftar.index') }}" method="GET" class="flex items-center space-x-4">
                <div class="flex-1">
                    <label for="kode_unik" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-search mr-1"></i> Cari Berdasarkan Kode Unik
                    </label>
                    <input type="text" name="kode_unik" id="kode_unik" value="{{ request('kode_unik') }}"
                        placeholder="Masukkan kode unik laporan"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300">
                </div>
                <div class="mt-8">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                        <i class="fas fa-search mr-2"></i> Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Laporan -->
        <!-- Tabel Laporan (hanya muncul jika ada pencarian) -->
        @if (request('kode_unik'))
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-file-alt mr-2 text-blue-500"></i> Hasil Pencarian
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-200 p-3 text-left text-gray-700">No</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Kode Unik</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Judul</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Kategori</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Status</th>
                                <th class="border border-gray-200 p-3 text-left text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laporans as $index => $laporan)
                                <tr class="border border-gray-200">
                                    <td class="border border-gray-200 p-3">{{ $laporans->firstItem() + $index }}</td>
                                    <td class="border border-gray-200 p-3 font-mono">{{ $laporan->kode_unik }}</td>
                                    <td class="border border-gray-200 p-3">{{ $laporan->judul }}</td>
                                    <td class="border border-gray-200 p-3">{{ $laporan->kategori }}</td>
                                    <td class="border border-gray-200 p-3">
                                        @php
                                            $statusColors = [
                                                'Dikirim' => 'bg-blue-100 text-blue-700',
                                                'Diproses' => 'bg-yellow-100 text-yellow-700',
                                                'Selesai' => 'bg-green-100 text-green-700',
                                                'Ditolak' => 'bg-red-100 text-red-700',
                                            ];
                                        @endphp
                                        <span
                                            class="inline-block px-3 py-1 text-sm font-semibold rounded-full {{ $statusColors[$laporan->status] ?? 'bg-gray-100 text-gray-500' }}">
                                            {{ $laporan->status }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-200 p-3">
                                        <a href="{{ route('daftar.show', $laporan->kode_unik) }}"
                                            class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                                            <i class="fas fa-eye mr-2"></i> Lihat
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border border-gray-200 p-3 text-center text-gray-600">
                                        Tidak ada laporan yang ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $laporans->links('pagination::tailwind') }}
                </div>
            </div>
        @endif
    </div>
@endsection
