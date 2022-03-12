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

Route::get('/products/{type}', [\App\Http\Controllers\ProductController::class, 'type'])->name('products.type');

Route::resource('products', \App\Http\Controllers\ProductController::class);
//Route::get('/products/{type}', [\App\Http\Controllers\ProductController::class, 'type'])->name('products.type');



Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\SellerproductController::class, 'index'])->name('seller.products.index');
    Route::post('products', [\App\Http\Controllers\SellerproductController::class,'store'])->name('seller.products.store');
    Route::get('products', [\App\Http\Controllers\SellerproductController::class, 'index'])->name('seller.products.index');
    Route::get('products/create', [\App\Http\Controllers\SellerproductController::class, 'create'])->name('seller.products.create');
    Route::get('products/{id}/edit', [\App\Http\Controllers\SellerproductController::class, 'edit'])->name('seller.products.edit');
    Route::patch('products/{id}', [\App\Http\Controllers\SellerproductController::class, 'update'])->name('seller.products.update');
    Route::get('products/{id}', [\App\Http\Controllers\SellerproductController::class, 'destroy'])->name('seller.products.destroy');
});

