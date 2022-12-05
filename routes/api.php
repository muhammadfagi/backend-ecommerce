<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [ApiController::class, 'register']);
    Route::post('login', [ApiController::class, 'login']);
    Route::post('logout', [ApiController::class, 'logout']);
    Route::post('refresh', [ApiController::class, 'refresh']);
    Route::post('me', [ApiController::class, 'me']);
    // Route::get('/products', [ProductApiController::class,'bookAuth'])->middleware('jwt.verify');
    // Route::get('/products', [ProductApiController::class,'index'])->middleware('jwt.verify');
    Route::get('/products', [ProductApiController::class,'index'])->middleware('jwt.verify');
    Route::post('/products', [ProductApiController::class,'store'])->middleware('jwt.verify');
    Route::get('/products/{id}', [ProductApiController::class, 'show'])->middleware('jwt.verify');
    Route::put('products/{id}', [ProductApiController::class,'update'])->middleware('jwt.verify');
    Route::delete('products/{id}', [ProductApiController::class,'destroy'])->middleware('jwt.verify');

    // Route::post('/orders/{id}', [OrderController::class, 'order']);
    Route::get('/orders', [OrderController::class,'index'])->middleware('jwt.verify');
    Route::post('/orders', [OrderController::class,'store'])->middleware('jwt.verify');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->middleware('jwt.verify');
    Route::put('orders/{id}', [OrderController::class,'update'])->middleware('jwt.verify');
    Route::delete('orders/{id}', [OrderController::class,'destroy'])->middleware('jwt.verify');

});
