<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\MoneyRequestController;
use App\Http\Controllers\User\ReceiveRequestController;
use App\Http\Controllers\User\Auth\RegistrationController;
use App\Http\Controllers\User\CashOutController;

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

        //sent money request routes
        Route::get('money-request', [MoneyRequestController::class, 'index'])->name('money-request');
        Route::get('check-email/{email}', [MoneyRequestController::class, 'checkValidEmail'])->name('check-email');
        Route::post('money-request', [MoneyRequestController::class, 'storeMoneyRequest'])->name('money-request');
        Route::get('get-money-request', [MoneyRequestController::class, 'getAllMoneyRequestViaUserId'])->name('get-all-money-request');
        Route::delete('delete-money-request/{id}', [MoneyRequestController::class, 'deleteMoneyRequest'])->name('delete-money-request');

        //receive money request routes
        Route::get('receive-money-request', [ReceiveRequestController::class, 'index'])->name('receive-money-request');
        Route::get('receive-all-money-request', [ReceiveRequestController::class, 'getAllMoneyReceivedRequestViaUserId'])->name('receive-all-money-request');
        Route::put('approve-money-request/{money}', [ReceiveRequestController::class, 'approveMoneyRequest'])->name('approve-money-request');

        //get all currency
        Route::get('get-all-currency-for-request',[CurrencyController::class,'getAllCurrency'])->name('get-all-currency-for-request');

        //CashOut Routes
        Route::middleware('can:isUser')->group(function () {
            Route::get('cashout', [CashOutController::class, 'index'])->name('cashout');
            Route::post('cashout', [CashOutController::class, 'storeCashOutRequest'])->name('cashout');
            Route::get('check-merchant-email/{email}', [CashOutController::class, 'checkValidEmail'])->name('check-email');
            Route::get('get-all-cashout-history-of-an-singer-user', [CashOutController::class, 'getAllCashOutHistoryViaUserId'])->name('get-all-cashout-history-of-an-singer-user');
        });

    });

});



