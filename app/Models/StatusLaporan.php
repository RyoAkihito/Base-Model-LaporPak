<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLaporan extends Model
{
    use HasFactory;

    protected $table = 'status_laporan';

    protected $fillable = ['nama', 'warna_label'];

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'status_id');
    }
}
