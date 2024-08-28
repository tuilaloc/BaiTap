<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;

Route::apiResource('users', UsersController::class);





// Route::post('products', [ProductController::class, 'store']);
// Route::get('products', [ProductController::class, 'index']);
// Route::put('products/{id}', [ProductController::class, 'update']);
// Route::get('products/{id}', [ProductController::class, 'show']);
// Route::delete('products/{id}', [ProductController::class, 'destroy']);

Route::apiResource('products', ProductController::class);

Route::apiResource('customers', CustomerController::class);

Route::apiResource('categories', CategoriesController::class);
