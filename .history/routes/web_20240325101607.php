<?php

use App\Http\Controllers\Frontend\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TentangKamiController::class, 'homePage']);
