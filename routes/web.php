<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan/{kode_unik}', [LaporanController::class, 'show'])->name('laporan.show');


// Tetap untuk membuat laporan
Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

// Diubah dari /laporan ke /daftar
Route::get('/daftar', [LaporanController::class, 'index'])->name('daftar.index');
Route::get('/daftar/{kode_unik}', [LaporanController::class, 'show'])->name('daftar.show');


//ROUTE UNTUK LOGIN
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});
//ROUTE UNTUK ADMIN
route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('UserAkses:admin')
    ->name('admin');

    // Route::get('/Dashboard', function () {
    //     return view('Dashboard'); // Pastikan file blade-nya ada
    // })->middleware('UserAkses:petugas')->name('Dashboard'); // Tambahkan name

    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/', function () {
    return view('home'); // Pastikan file blade-nya ada
});

// Route::get('/home', function () {
//     return view('home'); // Sesuaikan dengan halaman yang ada
// })->name('home');

//ROUTE UNTUK LAPORAN
// Route::get('/admin', [AdminController::class, 'Laporan'])->name('Laporan')->middleware('auth');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';