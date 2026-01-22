<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('/auth/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('auth.register');