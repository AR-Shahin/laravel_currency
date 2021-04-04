<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::view('ars', 'backend.admin.layouts.master');


Route::prefix('admin')->name('admin.')->group(function(){
    //Dashboard Routes
    Route::get('dashboard',[DashboardController::class,'index'])->middleware('auth:admin')->name('dashboard');

    //Auth Routes
    Route::get('login',[LoginController::class,'showLoginForm'])->middleware('guest:admin')->name('login');
    Route::post('login', [LoginController::class, 'processLogin'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

//Currency Routes
Route::resource('currency', CurrencyController::class)->middleware('auth:admin');
Route::get('get-currency',[CurrencyController::class,'getAllCurrency'])->middleware('auth:admin')->name('get-all-currency');


