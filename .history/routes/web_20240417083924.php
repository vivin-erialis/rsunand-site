<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'homePage']);
Route::get('tentang-kami', [TentangKamiController::class, 'tentangKami']);
Route::get('jadwal-dokter', [InformasiController::class, 'jadwalDokter']);
Route::get('informasi-dokter', [InformasiController::class, 'informasiDokter']);
Route::get('bagian-instalasi', [InformasiController::class, 'bagianInstalasi']);
Route::get('berita', [ArtikelController::class, 'berita']);
