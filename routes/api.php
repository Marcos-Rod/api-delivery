<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DeliveryAvailabilityController;
use App\Http\Controllers\DeliveryCoordinatesController;
use App\Http\Controllers\EstablishmentsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TakeOrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth:sanctum')->group(function () {
    Route::put('availability', [DeliveryAvailabilityController::class, 'update']);
    Route::put('coordinates', [DeliveryCoordinatesController::class, 'update']);
    Route::put('orders/{order}/take', [TakeOrdersController::class, 'update']);
    Route::get('my-orders', [MyOrdersController::class, 'index']);
    Route::put('my-orders/{order}', [MyOrdersController::class, 'update']);

    
    Route::get('establishments', [EstablishmentsController::class, 'index']);
    Route::get('establishments/{establishment}', [EstablishmentsController::class, 'show']);
    Route::get('products/{product}', [ProductsController::class, 'show'])->name('products:show');
    Route::get('cart', [CartController::class, 'index']);
    Route::post('cart/add-product/{product}', [CartController::class, 'store']);
    Route::put('cart/{rowId}', [CartController::class, 'update']);
    Route::delete('cart/{rowId}', [CartController::class, 'destroy']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('orders', [OrderController::class, 'index']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});



Route::post('login', [LoginController::class, 'login']);
