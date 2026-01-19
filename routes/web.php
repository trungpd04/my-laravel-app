<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/user-list', function () {

    $data = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john.doe@example.com'],
        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane.doe@example.com'],
        ['id' => 3, 'name' => 'Jim Doe', 'email' => 'jim.doe@example.com'],
        ['id' => 4, 'name' => 'Jill Doe', 'email' => 'jill.doe@example.com'],
        ['id' => 5, 'name' => 'Jack Doe', 'email' => 'jack.doe@example.com'],
        ['id' => 6, 'name' => 'Jill Doe', 'email' => 'jill.doe@example.com'],
    ];

    return view('user-list', ['data' => $data]);
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/user/{id}', function ($id) {
    $data = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john.doe@example.com'],
        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane.doe@example.com'],
        ['id' => 3, 'name' => 'Jim Doe', 'email' => 'jim.doe@example.com'],
        ['id' => 4, 'name' => 'Jill Doe', 'email' => 'jill.doe@example.com'],
        ['id' => 5, 'name' => 'Jack Doe', 'email' => 'jack.doe@example.com'],
        ['id' => 6, 'name' => 'Jill Doe', 'email' => 'jill.doe@example.com'],
    ];
    return view('user-detail', ['data' => collect($data)->firstWhere('id', $id)]);
});

Route::get('/product', [ProductController::class, 'listProduct']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);
Route::get('/product/edit/{id}', [ProductController::class, 'editProduct']);
Route::get('/product/create', [ProductController::class, 'createProduct']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [AuthController::class, 'register']);