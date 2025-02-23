<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/products', [ProductController::class, 'store']);

Route::get('/product-stock-levels', [ProductController::class, 'getStockLevels']);

