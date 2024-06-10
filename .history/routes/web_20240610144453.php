<?php

use App\Http\Controllers\Backend\ArtikelController as BackendArtikelController;
use App\Http\Controllers\Backend\DireksiController;
use \App\Http\Controllers\Backend\DokterController ;
use App\Http\Controllers\Backend\LayananController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Frontend\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\InformasiController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LayananController as FrontendLayananController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/get-data-home', [HomeController::class, 'getHomePage']);
Route::get('/', [HomeController::class, 'HomePage']);

// Informasi
Route::get('tentang-kami', [InformasiController::class, 'tentangKami']);
Route::get('jadwal-dokter', [InformasiController::class, 'jadwalDokter']);
Route::get('informasi-dokter', [InformasiController::class, 'informasiDokter']);
Route::get('bagian-instalasi', [InformasiController::class, 'bagianInstalasi']);
Route::get('bagian-instalasi/{id}', [InformasiController::class, 'detailBagianInstalasi']);

// Layanan
Route::get('layanan-unggulan', [FrontendLayananController::class, 'layananUnggulan']);
Route::get('layanan-penunjang', [FrontendLayananController::class, 'layananPenunjang']);
Route::get('layanan-rajal', [FrontendLayananController::class, 'layananRajal']);
Route::get('layanan-lainnya', [FrontendLayananController::class, 'layananLainnya']);
Route::get('layanan-unggulan/{id}', [FrontendLayananController::class, 'detailLayananUnggulan']);
Route::get('layanan-penunjang/{id}', [FrontendLayananController::class, 'detailLayananPenunjang']);
Route::get('layanan-rajal/{id}', [FrontendLayananController::class, 'detailLayananRajal']);
Route::get('layanan-lainnya/{id}', [FrontendLayananController::class, 'detailLayananLainnya']);

// Fasilitas
Route::get('layanan-lainnya/{id}', [FrontendLayananController::class, 'fasilitas']);

// Artikel
Route::get('berita', [ArtikelController::class, 'berita']);
Route::get('/berita/{id}', [ArtikelController::class, 'detailBerita']);
Route::get('/ilmiah/{id}', [ArtikelController::class, 'detailIlmiah']);
Route::get('/pendidikan-penelitian/{id}', [ArtikelController::class, 'detailPendidikanPelatihan']);
Route::get('/penyakit-pengobatan/{id}', [ArtikelController::class, 'detailPenyakitPengobatan']);

Route::get('ilmiah', [ArtikelController::class, 'ilmiah']);
Route::get('pendidikan-penelitian', [ArtikelController::class, 'pendidikanPelatihan']);
Route::get('penyakit-pengobatan', [ArtikelController::class, 'penyakitPengobatan']);

Route::get('kontak', [HomeController::class, 'kontak']);
Route::get('informasi', [HomeController::class, 'informasi']);
Route::get('/karir', [HomeController::class, 'karir']);

// not found
Route::fallback(function () {
    return response()->view('Frontend.page-not-found', [], 404);
});

//
Route::prefix('admin')->middleware('auth')->group(function () {
    // artikel
    Route::get('/artikel', [BackendArtikelController::class, 'indexArtikel']);
    Route::post('/artikel', [BackendArtikelController::class, 'saveDataArtikel']);
    Route::get('/artikel/{id}/edit', [BackendArtikelController::class, 'getDataforEdit']);
    Route::put('/artikel/{id}/status', [BackendArtikelController::class, 'editStatus']);
    Route::put('/artikel/{id}', [BackendArtikelController::class, 'updateDataArtikel']);
    Route::delete('/artikel/{id}', [BackendArtikelController::class, 'hapusDataArtikel']);

    // direksi
    Route::get('/direksi', [DireksiController::class, 'indexDireksi']);
    Route::post('/direksi', [DireksiController::class, 'saveDireksi']);
    Route::get('/direksi/{id}/edit', [DireksiController::class, 'getDataforEdit']);
    Route::put('/direksi/{id}/status', [DireksiController::class, 'editStatus']);
    Route::put('/direksi/{id}', [DireksiController::class, 'updateDireksi']);
    Route::delete('/direksi/{id}', [DireksiController::class, 'hapusDireksi']);

    // slider
    Route::get('/slider', [SliderController::class, 'indexSlider']);
    Route::post('/slider', [SliderController::class, 'saveSlider']);
    Route::get('/slider/{id}/edit', [SliderController::class, 'getDataforEdit']);
    Route::put('/slider/{id}/status', [SliderController::class, 'editStatus']);
    Route::put('/slider/{id}', [SliderController::class, 'updateSlider']);
    Route::delete('/slider/{id}', [SliderController::class, 'hapusSlider']);

    // dokter
    Route::get('/dokter', [DokterController::class, 'indexDokter']);
    Route::post('/dokter', [DokterController::class, 'saveDokter']);
    Route::get('/dokter/{id}/edit', [DokterController::class, 'getDataforEdit']);
    Route::put('/dokter/{id}', [DokterController::class, 'updateDokter']);
    Route::delete('/dokter/{id}', [DokterController::class, 'hapusDokter']);

    // layanan
    Route::get('/layanan', [LayananController::class, 'indexLayanan']);
    Route::post('/layanan', [LayananController::class, 'saveLayanan']);
    Route::get('/layanan/{id}/edit', [LayananController::class, 'getDataforEdit']);
    Route::put('/layanan/{id}', [LayananController::class, 'updateLayanan']);
    Route::delete('/layanan/{id}', [LayananController::class, 'hapusLayanan']);
});


// get data for index
Route::get('/get-data-artikel', [BackendArtikelController::class, 'getArtikel'])->name('getArtikel');
Route::get('/get-data-dokter', [DokterController::class, 'getDokter'])->name('getDokter');
Route::get('/get-data-direksi', [DireksiController::class, 'getDireksi'])->name('getDireksi');
Route::get('/get-data-slider', [SliderController::class, 'getSlider'])->name('getSlider');
Route::get('/get-data-layanan', [LayananController::class, 'getLayanan'])->name('getLayanan');
