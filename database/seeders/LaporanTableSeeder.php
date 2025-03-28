<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanTableSeeder extends Seeder
{
    public function run()
    {
        Laporan::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'judul' => 'Jalan Berlubang di Depan Rumah',
            'deskripsi' => 'Jalan di depan rumah berlubang besar dan berbahaya.',
            'lokasi' => 'Jakarta Pusat',
            'foto_bukti' => null,
            'kategori' => 'Infrastruktur',
            'status' => 'Dikirim',
        ]);

        Laporan::create([
            'nama' => 'Siti Aisyah',
            'email' => 'siti@example.com',
            'judul' => 'Lampu Jalan Mati',
            'deskripsi' => 'Lampu jalan sudah 2 minggu mati, mohon perbaikan.',
            'lokasi' => 'Bandung',
            'foto_bukti' => null,
            'kategori' => 'Layanan Publik',
            'status' => 'Dikirim',
        ]);
    }
}
