<?php


// routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management');
    });
});
