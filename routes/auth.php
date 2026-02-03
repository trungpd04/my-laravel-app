<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('admin.auth.login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.auth.register.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
});

Route::get('/auth/login', function () {
    return view('admin.auth.login');
})->name('admin.auth.login');

Route::get('/auth/register', function () {
    return view('admin.auth.register');
})->name('admin.auth.register');