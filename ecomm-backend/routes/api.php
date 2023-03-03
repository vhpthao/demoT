<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


Route::get('products', [ProductController::class, 'list']);
Route::get('products/{id}', [ProductController::class, 'getProduct']);
Route::post('products/add', [ProductController::class, 'addProduct']);
Route::delete('products/delete/{id}', [ProductController::class, 'delete']);
Route::put('products/update/{id}', [ProductController::class, 'updateProduct']);
Route::get('products/search/{id}', [ProductController::class, 'search']);
