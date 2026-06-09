<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/* GET */

Route::get('/', [PageController::class, 'home']) -> name('home');
Route::get('/about', [PageController::class,'about']) -> name('about');
Route::get('/faq', [PageController::class, 'faq']) -> name('faq');


/* POST */

Route::post('/request-credit', [PageController::class, 'submitRequest'])->name('credit.request');