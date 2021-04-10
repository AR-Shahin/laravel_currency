<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\Auth\RegistrationController;
use App\Http\Controllers\User\MoneyRequestController;
use Illuminate\Support\Facades\Route;

Route::view('user', 'backend.user.auth.registration');

Route::prefix('user')->name('user.')->group(function () {

    Route::middleware('guest:web')->group(function(){
        //Auth Routes
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'processLogin'])->name('login');
        Route::get('registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration');
        Route::post('registration', [RegistrationController::class, 'processRegistration'])->name('registration');
        Route::get('verify/{token}', [RegistrationController::class, 'verifyUserViaEmail'])->name('verify');
    });
    Route::middleware('auth:web')->group(function () {
        //logout
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        //Dashboard Routes
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::get('money-request', [MoneyRequestController::class, 'index'])->name('money-request');
        Route::get('check-email/{email}', [MoneyRequestController::class, 'checkValidEmail'])->name('check-email');
        Route::post('money-request', [MoneyRequestController::class, 'storeMoneyRequest'])->name('money-request');
        Route::get('get-money-request', [MoneyRequestController::class, 'getAllMoneyRequestViaUserId'])->name('get-all-money-request');
    });

});


