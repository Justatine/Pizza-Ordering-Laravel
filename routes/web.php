<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InchargeController;

Route::get('/', [ClientController::class, 'show']);
Route::get('/menu', [ClientController::class, 'menu']);
Route::get('/services', [ClientController::class, 'services']);
Route::get('/about', [ClientController::class, 'about']);
Route::get('/contact', [ClientController::class, 'contact']);
Route::get('/signin', [ClientController::class, 'signin'])->name('login');
Route::get('/signup', [ClientController::class, 'signup'])->name('register');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/index', [AdminController::class, '__invoke']);
    Route::get('/products', [AdminController::class, 'products']);
    Route::get('/users', [AdminController::class, 'users']);

    // Users
    Route::get('/users/new', [UserController::class, 'newUser']);
    Route::post('/users/new/store', [UserController::class, 'storeUser']);
    Route::delete('/users/{user}', [UserController::class, 'deleteUser']);
    Route::get('/users/{user}', [UserController::class, 'editUser']);
    Route::put('/users/{user}', [UserController::class, 'updateUser']);

    // Products
    Route::get('/products/new', [ProductController::class, 'newProduct']);
    Route::post('/products/new/store', [ProductController::class, 'storeProduct']);
    Route::delete('/products/{product}', [ProductController::class, 'deleteProduct']);
    Route::get('/products/{product}', [ProductController::class, 'editProduct']);
    Route::put('/products/{product}', [ProductController::class, 'updateProduct']);
});

Route::prefix('incharge')->middleware(['auth', 'is_incharge'])->group(function () {
    Route::get('/index', [InchargeController::class, '__invoke']);
});