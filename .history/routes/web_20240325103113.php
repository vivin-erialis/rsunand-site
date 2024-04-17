<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'homePage']);
Route::get('tentang-kami', [TentangKamiController::class, 'tentangKami']);
