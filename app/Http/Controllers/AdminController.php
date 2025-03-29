<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin');

    }

    function Laporan(){
        $laporan = Laporan::all();

        $TotalLaporan = DB::table('laporan')->count();
        $LaporanPending = DB::table('laporan')->where('Status', 'Pending')->count();
        $LaporanSelesai = DB::table('laporan')->where('Status', 'Selesai')->count();

        return view('admin', compact('laporan'),
        [
            'TotalLaporan' => $TotalLaporan,
            'LaporanPending' => $LaporanPending,
            'LaporanSelesai' => $LaporanSelesai
        ]);
    }
}


