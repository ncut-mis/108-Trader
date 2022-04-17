<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', function () {
    return view('home');
});


Route::get('/products_detail', function () {
    return view('products_detail');
});

//Route::get('/products/{type}', [\App\Http\Controllers\ProductController::class, 'type'])->name('products.type');

Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);

Route::get('/seller/dashboard', function () {
    return view('seller.dashboard');
})->name('seller.dashboard');

//商品上架
Route::get('/seller/products/launch/{id}', [\App\Http\Controllers\SellerproductController::class, 'launch'])->name('seller.products.launch');

//商品下架
Route::get('/seller/products/stop/{id}', [\App\Http\Controllers\SellerproductController::class, 'stop'])->name('seller.products.stop');

//刪除商品
Route::get('/seller/products/{id}', [\App\Http\Controllers\SellerproductController::class, 'destroy'])->name('seller.products.destroy');

Route::resource('seller.products', \App\Http\Controllers\SellerproductController::class)->names([
    'index' =>'seller.products.index',
    'edit' => 'seller.products.edit',
    'create'=>'seller.products.create'
]);



//Route::get('/detail/{id}', [\App\Http\Controllers\SellerorderController::class, 'detail'])->name('seller.products.detail');
