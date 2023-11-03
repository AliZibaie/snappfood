<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommentController as AdminComment;
use App\Http\Controllers\AssignDiscountController;
use App\Http\Controllers\Seller\CommentController as SellerComment;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\RestaurantCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Seller\FoodController;
use App\Http\Controllers\Seller\FoodPartyController;
use App\Http\Controllers\Seller\RestaurantController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*o
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('home',[PageController::class, 'home'])->name('home');
    Route::post('dashboard',[AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard',[PageController::class, 'dashboard'])->name('dashboard');
    Route::resource('requests/sellers', SellerController::class)->middleware('stop_seller');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])
        ->name('show.login');
    Route::post('login', [AuthController::class, 'login'])
        ->name('login');
    Route::get('register', [AuthController::class, 'showRegister'])
        ->name('show.register');
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');
    Route::get('/',[PageController::class, 'welcome']);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('panel/admin/foodCategories',FoodCategoryController::class);
    Route::resource('panel/admin/banners',BannerController::class);
    Route::resource('panel/admin/comments',AdminComment::class);
    Route::resource('panel/admin/discounts',DiscountController::class);
    Route::resource('panel/admin/restaurantCategories',RestaurantCategoryController::class);
    Route::put('panel/admin/banners', [BannerController::class, 'set'])->name('banners.set');
});

Route::group(['middleware' => ['role:seller']], function () {
    Route::resource('panel/seller/foods',FoodController::class);
    Route::resource('panel/seller/comments',SellerComment::class);
    Route::resource('panel/seller/foodParties',FoodPartyController::class);
    Route::resource('panel/seller/restaurants',RestaurantController::class);
    Route::put('panel/seller/restaurants',[RestaurantController::class, 'updateStatus'])
        ->name('restaurants.updateStatus');
    Route::put('panel/seller/foods/{food}', [FoodController::class, 'assignDiscount'])->name('assign.discount');
});
//Route::get('admin/panel/sellers', [ManageSellerController::class, 'index']);
//Route::get('/test',[UserController::class, 'test']);
