<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/* GET */

Route::get('/', [PageController::class, 'home']) -> name('home');
Route::get('/about', [PageController::class,'about']) -> name('about');
Route::get('/faq', [PageController::class, 'faq']) -> name('faq');
Route::get('/contact', [PageController::class,'contact']) -> name('contact');

Route::get('/businesses', function () {
    return view('pages.business'); 
})->name('business.landing');

Route::get('/merchant/signup', function () {
    return view('pages.merchant-register');
})->name('merchant.signup');


/* POST */

Route::post('/request-credit', [PageController::class, 'submitRequest'])->name('credit.request');


/* merchmant */
Route::post('/merchant/signup', [PageController::class, 'storeMerchant'])->name('merchant.store');

Route::middleware(['auth'])->get('/merchant/dashboard', function () {
    $transactions = [
        ['id' => 'TX-1042', 'user' => 'حمیدرضا محمدی', 'amount' => '۴,۵۰۰,۰۰۰ تومان', 'status' => 'موفق', 'date' => '۱۴۰۵/۰۳/۲۴'],
        ['id' => 'TX-1043', 'user' => 'سارا احمدی', 'amount' => '۱,۲۰۰,۰۰۰ تومان', 'status' => 'موفق', 'date' => '۱۴۰۵/۰۳/۲۴'],
        ['id' => 'TX-1044', 'user' => 'علی علوی', 'amount' => '۸,۹۰۰,۰۰۰ تومان', 'status' => 'در انتظار تایید', 'date' => '۱۴۰۵/۰۳/۲۳'],
    ];

    return view('pages.merch_dashboard', compact('transactions'));
})->name('merchant.dashboard');


Route::get('/merchant/dashboard', [PageController::class, 'showDashboard'])
     ->middleware('auth')
     ->name('merchant.dashboard');

    Route::get('/merchant/logout', function () {
    Illuminate\Support\Facades\Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    
    return redirect('/'); 
})->name('logout');