<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/orders', [OrderController::class, 'createOrder']);
Route::get('/orders', [OrderController::class, 'getOrders']);
