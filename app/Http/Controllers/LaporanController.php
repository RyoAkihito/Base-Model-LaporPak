<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman daftar laporan.
     */
    public function index(Request $request)
    {
        $query = $request->input('kode_unik');

        $laporans = Laporan::when($query, function ($q) use ($query) {
            return $q->where('kode_unik', 'like', "%{$query}%");
        })
            ->latest()
            ->paginate(10);

        return view('laporan.index', compact('laporans'));
    }

    /**
     * Menampilkan halaman membuat laporan baru.
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Menyimpan laporan baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:Infrastruktur,Pelayanan Publik,Lingkungan,Keamanan,Kesehatan,Transportasi,Sosial,Lainnya',
        ]);

        $validated['kode_unik'] = strtoupper(substr(uniqid('LAP-'), 0, 12));
        $validated['status'] = 'Dikirim';

        if ($request->hasFile('foto_bukti')) {
            $validated['foto_bukti'] = $request->file('foto_bukti')->store('laporan', 'public');
        }

        $laporan = Laporan::create($validated);

        return redirect()->route('laporan.show', $laporan->kode_unik)
            ->with('success', 'Laporan berhasil dikirim!');
    }

    /**
     * Menampilkan detail laporan berdasarkan kode unik.
     */
    public function show($kode_unik)
    {
        $laporan = Laporan::where('kode_unik', $kode_unik)->firstOrFail();
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Menampilkan halaman edit laporan.
     */

    /**
     * Memperbarui laporan.
     */
    public function update(Request $request, $kode_unik)
    {
        $laporan = Laporan::where('kode_unik', $kode_unik)->firstOrFail();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:Infrastruktur,Pelayanan Publik,Lingkungan,Keamanan,Kesehatan,Transportasi,Sosial,Lainnya',
            'status' => 'required|in:Dikirim,Diproses,Selesai,Ditolak',
        ]);

        if ($request->hasFile('foto_bukti')) {
            if ($laporan->foto_bukti) {
                Storage::disk('public')->delete($laporan->foto_bukti);
            }
            $validated['foto_bukti'] = $request->file('foto_bukti')->store('laporan', 'public');
        } else {
            $validated['foto_bukti'] = $laporan->foto_bukti;
        }

        $laporan->update($validated);

        return redirect()->route('laporan.show', $laporan->kode_unik)
            ->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * Menghapus laporan.
     */
    public function destroy($kode_unik)
    {
        $laporan = Laporan::where('kode_unik', $kode_unik)->firstOrFail();

        if ($laporan->foto_bukti) {
            Storage::disk('public')->delete($laporan->foto_bukti);
        }

        $laporan->delete();

        return redirect()->route('daftar.index')
            ->with('success', 'Laporan berhasil dihapus!');
    }
}
