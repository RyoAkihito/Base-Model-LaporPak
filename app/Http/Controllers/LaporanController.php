<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'judul' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'foto_bukti' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:Infrastruktur,Pelayanan Publik,Lingkungan,Keamanan,Kesehatan,Transportasi,Sosial,Lainnya',
        ]);

        $laporan = new Laporan($request->all());
        if ($request->hasFile('foto_bukti')) {
            $file = $request->file('foto_bukti');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $laporan->foto_bukti = 'uploads/' . $filename;
        }
        $laporan->save();

        return redirect()->route('laporan.show', $laporan->kode_unik)
                         ->with('success', 'Laporan berhasil dikirim!');
    }

    public function show($kode_unik)
    {
        $laporan = Laporan::where('kode_unik', $kode_unik)->firstOrFail();
        return view('laporan.show', compact('laporan'));
    }
}
