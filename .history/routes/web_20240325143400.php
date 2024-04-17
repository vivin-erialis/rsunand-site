<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'homePage']);
Route::get('tentang-kami', [TentangKamiController::class, 'tentangKami']);
Route::get('informasi-dokter', [InformasiController::class, 'informasiDokter']);
Route::get('informasi-dokter', [InformasiController::class, 'informasiDokter']);
