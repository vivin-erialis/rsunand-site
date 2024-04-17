<?php

use App\Http\Controllers\Frontend\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('artikel' [ArtikelController::class], 'getArtikel');
