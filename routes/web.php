<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view()->exists('backend.user.auth.login') ? view('backend.user.auth.login') : abort(404);
})->middleware('guest:web');
