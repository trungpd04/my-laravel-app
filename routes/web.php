<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'listProduct'])->name('product.list');
    Route::get('/create', function () {
        return view('product.create');
    })->name('product.create');
    Route::post('/create', [ProductController::class, 'createProduct'])->name('product.create');
    Route::get('/image/{filename}', [ProductController::class, 'getProductImage'])->name('product.image');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::get('/{id}', [ProductController::class, 'getProduct'])->name('product.detail');
});

Route::fallback(function () {
    return view('error.404');
});

Route::get('/sinhvien/{name?}/{mssv?}', function (?string $name = 'Luong Xuan Hieu', ?string $mssv = '123456') {
    return view('profile.thong-tin-sinh-vien', ['name' => $name, 'mssv' => $mssv]);
})->name('thongtinsinhvien');


Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
})->name('banco');