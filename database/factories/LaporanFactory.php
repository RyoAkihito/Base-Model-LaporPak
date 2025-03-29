<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanFactory extends Factory
{
    protected $model = Laporan::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'judul' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'lokasi' => $this->faker->address(),
            'foto_bukti' => null,
            'kategori' => $this->faker->randomElement(['Infrastruktur', 'Pelayanan Publik', 'Lingkungan', 'Keamanan', 'Kesehatan', 'Transportasi', 'Sosial', 'Lainnya']),
            'status' => 'Dikirim',
            'kode_unik' => str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT),
        ];
    }
}
