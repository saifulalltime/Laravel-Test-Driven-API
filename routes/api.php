<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product Controller API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('product')->controller(ProductController::class)->group(function () {
    // Get All Product List 
    Route::get('list', 'ProductList');
    // Get Single Product Info
    Route::get('single/info/{id}', 'ProductSingleInfo');

});

/*
|--------------------------------------------------------------------------
| Order Controller API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('orders')->controller(OrderController::class)->group(function () {
    // Create an Order
    Route::post('create', 'createOrder');
    // Get Single Product Info
    Route::get('single/info/{id}', 'ProductSingleInfo');

});

