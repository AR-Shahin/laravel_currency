<?php

use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::view('ars', 'backend.admin.layouts.master');


Route::prefix('admin')->name('admin.')->group(function(){
    //Dashboard Routes
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
});

//Currency Routes
Route::resource('currency', CurrencyController::class);
Route::get('get-currency',[CurrencyController::class,'getAllCurrency'])->name('get-all-currency');
