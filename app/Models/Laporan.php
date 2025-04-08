<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'nama',
        'email',
        'judul',
        'deskripsi',
        'lokasi',
        'foto_bukti',
        'kategori',
        'status_id', // foreign key menggantikan 'status'
        'kode_unik'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($laporan) {
            if (empty($laporan->kode_unik)) {
                $laporan->kode_unik = self::generateUniqueCode();
            }
        });
    }

    private static function generateUniqueCode()
    {
        do {
            $code = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
        } while (self::where('kode_unik', $code)->exists());

        return $code;
    }


    
}
