<?php

use App\Models\Exam;
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

Route::resource('seller/products', \App\Http\Controllers\SellerproductController::class)->names([
    'index' =>'seller.products.index',
    'edit' => 'seller.products.edit',
    'create'=>'seller.products.create'
]);

//商品各類別
Route::prefix('/seller/products/type')->group(function () {
    Route::get('/coat', [\App\Http\Controllers\SellerproductController::class, 'type1'])->name('seller.products.type.coat');
    Route::get('/pan', [\App\Http\Controllers\SellerproductController::class, 'type2'])->name('seller.products.type.pan');
    Route::get('/book', [\App\Http\Controllers\SellerproductController::class, 'type3'])->name('seller.products.type.book');
    Route::get('/album', [\App\Http\Controllers\SellerproductController::class, 'type4'])->name('seller.products.type.album');
});

Route::prefix('/seller/orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\SellerorderController::class, 'index'])->name('seller.orders.index');
    Route::get('/undone', [\App\Http\Controllers\SellerorderController::class, 'undone'])->name('seller.orders.undone');
    Route::get('/history', [\App\Http\Controllers\SellerorderController::class, 'history'])->name('seller.orders.history');
    Route::get('/detail/{order}', [\App\Http\Controllers\SellerorderController::class, 'detail'])->name('seller.products.detail');
    Route::get('/confirm/{order}', [\App\Http\Controllers\SellerorderController::class, 'confirm'])->name('seller.products.confirm');//確認訂單
    Route::get('/comment', [\App\Http\Controllers\SellerorderController::class, 'comment'])->name('seller.products.comment');//評論評分
    Route::get('/amount', [\App\Http\Controllers\SellerorderController::class, 'amount'])->name('seller.products.amount');//進帳

});

Route::get('products/exams', [\App\Http\Controllers\ExamController::class, 'index'])->name('products.exams.index');

Route::get('products/{products}/exams/create', [\App\Http\Controllers\ExamController::class, 'create'])->name('products.exams.create');

Route::get('products/{products}/exams', [\App\Http\Controllers\ExamController::class, 'store'])->name('products.exams.store');

//Route::get('/detail/{id}', [\App\Http\Controllers\SellerorderController::class, 'detail'])->name('seller.products.detail');
