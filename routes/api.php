<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\RegisterAdminController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ItemController;

// Register Route
Route::post('/register', [RegisterController::class, 'register']);
// Login Route
Route::post('/login', [LoginController::class, 'login']);

Route::post('/registeradmin', [RegisterAdminController::class, 'register']);
Route::post('/registersuperadmin', [RegisterAdminController::class, 'register']);


// Protected Route for authenticated users
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Resource Routes
Route::apiResource('/product', App\Http\Controllers\Api\ProductController::class);
Route::apiResource('/article', App\Http\Controllers\Api\ArticleController::class);
Route::apiResource('/item', ItemController::class);
