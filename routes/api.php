<?php

use App\Http\Controllers\api\AddressController;
use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\FoodController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\api\RestaurantController;
use Illuminate\Http\Request;
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
    Route::apiResource('addresses', AddressController::class);
    Route::apiResource('restaurants', RestaurantController::class);
    Route::get('carts', [CartController::class, 'index']);
    Route::patch('carts/{cart}', [CartController::class, 'update']);
    Route::get('carts/{cart}', [CartController::class, 'show']);
    Route::post('carts/add', [CartController::class, 'store']);
    Route::apiResource('restaurants/{restaurant}/foods', FoodController::class);
    Route::post('addresses/{address}', [AddressController::class, 'setAddress']);
    Route::post('logout', [AuthController::class,'logout'] );
});

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
