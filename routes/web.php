<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgeController;

require __DIR__ . '/auth.php';
require __DIR__ . '/product.php';
require __DIR__ . '/error.php';

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sinhvien/{name?}/{mssv?}', function (?string $name = 'Luong Xuan Hieu', ?string $mssv = '123456') {
    return view('profile.thong-tin-sinh-vien', ['name' => $name, 'mssv' => $mssv]);
})->name('thongtinsinhvien');

Route::get('/age', function () {
    return view('age');
})->name('age');

Route::post('/age', [AgeController::class, 'age'])->name('age.submit');

Route::get('/access-denied', function () {
    return view('access-denied');
})->name('access.denied');

Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
})->name('banco');