<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerProductController;

require __DIR__ . '/auth.php';
require __DIR__ . '/product.php';
require __DIR__ . '/category.php';
require __DIR__ . '/error.php';
require __DIR__ . '/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

// Customer-facing product routes
Route::get('/shop/product/{id}', [CustomerProductController::class, 'show'])->name('customer.product.detail');

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