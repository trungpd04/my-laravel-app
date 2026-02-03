<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'listProduct'])->name('admin.product.list');
    Route::get('/create', function () {
        return view('admin.product.create');
    })->name('admin.product.create');
    Route::post('/create', [ProductController::class, 'createProduct'])->name('admin.product.create');
    Route::get('/image/{filename}', [ProductController::class, 'getProductImage'])->name('admin.product.image');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('admin.product.edit');
    Route::put('/edit/{id}', [ProductController::class, 'updateProduct'])->name('admin.product.update');
    Route::get('/{id}', [ProductController::class, 'getProduct'])->name('admin.product.detail');
});