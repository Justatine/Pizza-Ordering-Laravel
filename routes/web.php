<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
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
    Route::get('/products/new', [AdminController::class, 'newProduct']);
    Route::post('/products/new/store', [AdminController::class, 'storeProduct']);
});

Route::prefix('incharge')->middleware(['auth', 'is_incharge'])->group(function () {
    Route::get('/index', [InchargeController::class, '__invoke']);
});