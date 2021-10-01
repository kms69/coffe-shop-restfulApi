<?php

use App\Http\Controllers\API\v1\OrderController;
use App\Http\Controllers\API\v1\ProductController;

use Illuminate\Support\Facades\Route;

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
//products routes
Route::group(['prefix' => 'v1'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::post('/products', [ProductController::class, 'store']);
        Route::post('/products', [ProductController::class, 'index']);
        Route::get('products/{product}', [ProductController::class, 'update']);
        Route::get('products/{product}', [ProductController::class, 'destroy']);
    });
});
//orders routes
Route::group(['prefix' => 'v1'], function () {

    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/orders', [OrderController::class, 'index']);
    Route::get('orders/{order}', [OrderController::class, 'changeStatus']);
    Route::get('orders/{order}', [OrderController::class, 'destroy']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('orders/{order}', [OrderController::class, 'adminchangeStatus']);
    });
});






