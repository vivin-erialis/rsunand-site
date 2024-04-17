<?php

use App\Http\Controllers\Frontend\TentangKamiControllerControl
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TentangKamiControllerController::class, 'homePage']);
