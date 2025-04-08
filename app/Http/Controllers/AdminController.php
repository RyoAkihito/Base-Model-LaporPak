<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil semua data laporan
        $laporan = Laporan::all();

        // Menghitung statistik laporan berdasarkan status
        $TotalLaporan = Laporan::count();
        $LaporanPending = Laporan::where('status', 'Dikirim')->count();
        $LaporanSelesai = Laporan::where('status', 'Selesai')->count();

        // Mengirim data ke view
        return view('admin', compact('laporan', 'TotalLaporan', 'LaporanPending', 'LaporanSelesai'));
    }
}
