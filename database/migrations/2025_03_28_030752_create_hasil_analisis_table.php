<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hasil_analisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id')->constrained('laporan')->onDelete('cascade');
            $table->string('prediksi_kategori');
            $table->string('sentimen');
            $table->integer('jumlah_pengaduan_serupa');
            $table->timestamp('tanggal_analisis')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_analisis');
    }
};
