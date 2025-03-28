@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Laporan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Unik</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
            <tr>
                <td>{{ $laporan->kode_unik }}</td>
                <td>{{ $laporan->nama }}</td>
                <td>{{ $laporan->email }}</td>
                <td>{{ $laporan->judul }}</td>
                <td>{{ $laporan->kategori }}</td>
                <td>
                    <span class="badge bg-{{ $laporan->status == 'Dikirim' ? 'warning' : ($laporan->status == 'Diproses' ? 'info' : ($laporan->status == 'Selesai' ? 'success' : 'danger')) }}">
                        {{ $laporan->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
