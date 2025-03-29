@extends('layouts.app')

@section('title', 'Detail Laporan - ' . $laporan->judul)

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center">
        <i class="fas fa-file-alt mr-2 text-blue-500"></i> Detail Laporan
    </h2>

    <!-- Konten Detail -->
    <div class="space-y-4">
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-user mr-2"></i> Nama:</span>
            <span class="text-gray-900">{{ $laporan->nama }}</span>
        </div>
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-envelope mr-2"></i> Email:</span>
            <span class="text-gray-900">{{ $laporan->email }}</span>
        </div>
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-heading mr-2"></i> Judul:</span>
            <span class="text-gray-900 font-medium">{{ $laporan->judul }}</span>
        </div>
        <div class="flex items-start">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-align-left mr-2"></i> Deskripsi:</span>
            <p class="text-gray-900 flex-1">{{ $laporan->deskripsi }}</p>
        </div>
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-map-marker-alt mr-2"></i> Lokasi:</span>
            <span class="text-gray-900">{{ $laporan->lokasi }}</span>
        </div>
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-tag mr-2"></i> Kategori:</span>
            <span class="text-gray-900">{{ $laporan->kategori }}</span>
        </div>
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-info-circle mr-2"></i> Status:</span>
            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                {{ ($laporan->status == 'Selesai' ? 'bg-green-100 text-green-700' : ($laporan->status == 'Proses' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700')) }}">
                {{ $laporan->status }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="w-32 font-semibold text-gray-700"><i class="fas fa-key mr-2"></i> Kode Unik:</span>
            <span class="text-gray-900 font-mono bg-gray-100 px-2 py-1 rounded">{{ $laporan->kode_unik }}</span>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ url('/laporan') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
        @if($laporan->status != 'Selesai')
            <a href="{{ url('/laporan/' . $laporan->id . '/edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
        @endif
    </div>
</div>
@endsection