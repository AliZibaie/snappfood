<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageSellerController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PageController::class, 'welcome']);
//Route::get('home',[PageController::class, 'home']);
Route::get('dashboard',[PageController::class, 'dashboard'])->middleware('auth');
Route::post('dashboard',[AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])
        ->name('show.login');
    Route::post('login', [AuthController::class, 'login'])
        ->name('login');
    Route::get('register', [AuthController::class, 'showRegister'])
        ->name('show.register');
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');
});
Route::group(['middleware' => ['can:delete seller']], function () {
    Route::get('home',[PageController::class, 'home']);
});
Route::get('admin/panel/sellers', [ManageSellerController::class, 'index']);
