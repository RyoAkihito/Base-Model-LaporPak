<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('kode_unik', 8)->unique();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('foto_bukti')->nullable();
            $table->enum('kategori', [
                'Infrastruktur', 'Pelayanan Publik', 'Lingkungan', 
                'Keamanan', 'Kesehatan', 'Transportasi', 'Sosial', 'Lainnya'
            ]);
            $table->enum('status', ['Dikirim', 'Diproses', 'Selesai', 'Ditolak'])
                ->default('Dikirim');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan');
    }
};
