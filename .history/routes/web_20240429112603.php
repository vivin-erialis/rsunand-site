<?php

use App\Http\Controllers\Backend\ArtikelController as BackendArtikelController;
use \App\Http\Controllers\Backend\DokterController
use App\Http\Controllers\Frontend\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'homePage']);
// Informasi
Route::get('tentang-kami', [TentangKamiController::class, 'tentangKami']);
Route::get('jadwal-dokter', [InformasiController::class, 'jadwalDokter']);
Route::get('informasi-dokter', [InformasiController::class, 'informasiDokter']);
Route::get('bagian-instalasi', [InformasiController::class, 'bagianInstalasi']);

// Artikel
Route::get('berita', [ArtikelController::class, 'berita']);
Route::get('ilmiah', [ArtikelController::class, 'ilmiah']);
Route::get('pendidikan-pelatihan', [ArtikelController::class, 'pendidikanPelatihan']);
Route::get('penyakit-pengobatan', [ArtikelController::class, 'penyakitPengobatan']);

Route::get('kontak', [HomeController::class, 'kontak']);
Route::get('informasi', [HomeController::class, 'informasi']);
Route::get('/karir', [HomeController::class, 'karir']);

//
Route::prefix('admin')->group(function () {
    Route::resource('/artikel', BackendArtikelController::class);
    Route::resource('/dokter', DokterController::class);
});
