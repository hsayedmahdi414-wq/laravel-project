<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

Route::get('/', function () {
    return view('index');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/restaurant', [RestaurantController::class, 'index']);


use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;


Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('customers', CustomerController::class);