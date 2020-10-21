<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Shopping_cartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',                                             [ShopController::class,         'ShopPage']);

Route::get('/shop',                                         [ShopController::class,         'ShopPage']);
Route::get('/shop/filter-category/{filter_category}',       [ShopController::class,         'Filtered_by_category']);
Route::get('/shop/filter-category/unset/{filter_category}', [ShopController::class,         'Filter_unset']);
Route::get('/shop/filter-price/{filter_category}',          [ShopController::class,         'Filtered_by_price']);
Route::get('/shop/sort/{sort_by}',                          [ShopController::class,         'Sortered_by']);
Route::get('/shop-details',                                 [ShopController::class,         'ShopDetails']);
Route::get('/shopping-cart',                                [ShopController::class,         'ShoppingCart']);
Route::get('/shopping-cart/remove/{id}',                    [ShopController::class,         'RemoveFormCart']);

Route::get('/checkout',                                     [ShopController::class,         'Checkout']);
Route::post('/checkout',                                    [ShopController::class,         'CreateOrder']);

Route::get('/add/{id}',                                     [Shopping_cartController::class,'Add_product_to_cart']);


Route::get('/faker',                                        [HomeController::class, 'ShowForm']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
