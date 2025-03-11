<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Orders route without auth (as per your setup)
Route::post('/orders', [OrderController::class, 'store'])->withoutMiddleware(['auth:sanctum']);




Route::get('/products', [ProductController::class, 'index']);



Route::get('/products', [ProductController::class, 'index']);  // Fetch all products
Route::post('/products', [ProductController::class, 'store']); // Add a new product











