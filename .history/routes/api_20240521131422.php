<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/mahasiswa', MahasiswaController::class);
// Route::resource('/dosen', DosenController::class);
// Route::resource('/mata-kuliah', MataKuliahController::class);
// Route::resource('/nilai', NilaiController::class);

// Route::resource('/mahasiswa', ApiMahasiswaController::class);
// Route::resource('/dosen', ApiDosenController::class);
// Route::resource('mata-kuliah', ApiMataKuliahController::class);

Route::group(['prefix' => 'data'], function () {
    Route::get('get-data-mahasiswa', [MahasiswaMahasiswaController::class, 'getDataMahasiswa']);
    Route::post('save-data-mahasiswa', [MahasiswaMahasiswaController::class, 'saveDataMahasiswa']);
    Route::post('update-data-mahasiswa', [MahasiswaMahasiswaController::class, 'updateDataMahasiswa']);
});
