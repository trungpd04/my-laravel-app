<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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