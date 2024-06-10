<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/orders', [OrderController::class, 'createOrder']);
Route::get('/orders', [OrderController::class, 'getOrders']);

Route::apiResource('products', ProductController::class);
