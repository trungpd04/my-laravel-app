<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::prefix('/category')->group(function () {
    Route::get('/image/{filename}', [CategoryController::class, 'getCategoryImage'])->name('admin.category.image');
    Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
});