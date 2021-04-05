<?php

use App\Http\Controllers\User\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::view('user', 'backend.user.auth.registration');

Route::prefix('user')->name('user.')->group(function () {
    //Auth Routes
    Route::get('registration',[RegistrationController::class, 'showRegistrationForm'])->name('registration');
    Route::post('registration', [RegistrationController::class, 'processRegistration'])->name('registration');
    Route::get('verify/{token}', [RegistrationController::class, 'verifyUserViaEmail'])->name('verify');
});
