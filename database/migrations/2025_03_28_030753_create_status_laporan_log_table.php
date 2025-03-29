<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('status_laporan_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained('laporan')->onDelete('cascade');
            $table->enum('status_sebelumnya', ['Dikirim', 'Diproses', 'Selesai', 'Ditolak']);
            $table->enum('status_baru', ['Dikirim', 'Diproses', 'Selesai', 'Ditolak']);
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('tanggal_perubahan')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_laporan_log');
    }
};
