<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CashOutController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MoneyRequestController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::view('ars', 'backend.admin.layouts.master');


Route::prefix('admin')->name('admin.')->group(function(){
    //Dashboard Routes
    Route::get('dashboard',[DashboardController::class,'index'])->middleware('auth:admin')->name('dashboard');

    //Auth Routes
    Route::get('login',[LoginController::class,'showLoginForm'])->middleware('guest:admin')->name('login');
    Route::post('login', [LoginController::class, 'processLogin'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth:admin');
});

//Currency Routes
Route::resource('currency', CurrencyController::class)->middleware('auth:admin');
Route::get('get-currency',[CurrencyController::class,'getAllCurrency'])->middleware('auth:admin')->name('get-all-currency');

Route::middleware('auth:admin')->group(function () {


//User Routes
Route::get('get-all-users', [UserController::class,'index'])->name('get-all-users');
Route::get('add-money/{email}', [UserController::class, 'addMoney'])->name('add-money');
Route::post('add-money', [UserController::class, 'addMoneyInUser'])->name('add-money');
Route::get('user-all-transaction/{id}', [UserController::class, 'userAllTransactionHistory'])->name('user-all-transaction');

//Money Request Routes
Route::get('get-all-money-request',[MoneyRequestController::class, 'index'])->name('get-all-money-request');

//Cashout
Route::get('admin-cashout', [CashOutController::class, 'indexCashOut'])->name('admin-cashout');

});
