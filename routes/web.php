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

Route::get('/we', function () {
    return view('welcome');//首頁又變成空白狀況了，借用welcome的登入功能
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('sellers', \App\Http\Controllers\SellerController::class);
Route::resource('users', \App\Http\Controllers\MemberController::class);

Route::resource('cart_items', \App\Http\Controllers\CartItemController::class);

//修改會員資料(update無法正常使用)
Route::get('/users_data/{user}', [\App\Http\Controllers\MemberController::class, 'renew'])->name('users.renew');

//加入購物車，store做不出來
Route::get('/cartitems/{id}', [\App\Http\Controllers\CartItemController::class, 'add'])->name('cart_items.add');

//更改購物車數量，update做不出來
Route::get('/update', [\App\Http\Controllers\CartItemController::class, 'renew'])->name('cart_items.renew');

//結帳
Route::get('/check/{seller_id}', [\App\Http\Controllers\CartItemController::class, 'check'])->name('cart_items.check');

//確認購物清單後填入買家資訊
Route::get('/next_step/{seller_id}', [\App\Http\Controllers\CartItemController::class, 'next_step'])->name('cart_items.next_step');

//完成下單
Route::get('/done/{seller_id}', [\App\Http\Controllers\CartItemController::class, 'done'])->name('cart_items.done');

Route::resource('orders', \App\Http\Controllers\OrderController::class);

//訂單詳細資料，show方法有bug
Route::get('/orders_detail/{id}', [\App\Http\Controllers\OrderController::class, 'detail'])->name('orders.detail');

//訂單評分
Route::get('/orders_scores', [\App\Http\Controllers\OrderController::class, 'scores'])->name('orders.scores');

//訂單評論
Route::get('/orders_comments/{order}', [\App\Http\Controllers\OrderController::class, 'comments'])->name('orders.comments');

//完成訂單
Route::get('/orders_done/{order}', [\App\Http\Controllers\OrderController::class, 'done'])->name('orders.done');

//取消訂單
Route::get('/orders_cancel/{order}', [\App\Http\Controllers\OrderController::class, 'cancel'])->name('orders.cancel');

//退貨
Route::get('/orders_back/{order}', [\App\Http\Controllers\OrderController::class, 'back'])->name('orders.back');

Route::get('/products_search', [\App\Http\Controllers\ProductController::class, 'search'])->name('products.search');

//瀏覽個別商品，目前有BUG
Route::get('/products_detail/{id}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('products.detail');
//賣家賣場搜尋商品
Route::get('/markets_search', [\App\Http\Controllers\SellerController::class, 'search'])->name('sellers.search');
//賣家賣場搜尋商品
Route::get('/markets_categories', [\App\Http\Controllers\SellerController::class, 'category'])->name('sellers.category');
//賣家申請
Route::get('/seller_apply', [\App\Http\Controllers\SellerController::class, 'apply'])->name('sellers.apply');

//賣家公告
Route::get('/seller/post', [\App\Http\Controllers\PostController::class, 'index'])->name('seller.post');
Route::get('/seller/post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('/seller/item/{id}', [\App\Http\Controllers\PostController::class, 'show_item'])->name('posts.show_item');

//資料統計
Route::get('/seller/dashboard', [\App\Http\Controllers\SellerproductController::class, 'dashboard'])->name('seller.dashboard');

//商品上架
Route::get('/seller/products/launch/{id}', [\App\Http\Controllers\SellerproductController::class, 'launch'])->name('seller.products.launch');

//商品下架
Route::get('/seller/products/stop/{id}', [\App\Http\Controllers\SellerproductController::class, 'stop'])->name('seller.products.stop');

//刪除商品
Route::get('/seller/products/{id}', [\App\Http\Controllers\SellerproductController::class, 'destroy'])->name('seller.products.destroy');

//新增商品
Route::get('/products/create', [\App\Http\Controllers\SellerproductController::class, 'create'])->name('products.create');

Route::get('seller/products/detail/{id}', [\App\Http\Controllers\SellerproductController::class, 'detail'])->name('seller.product.detail');

Route::resource('seller/products', \App\Http\Controllers\SellerproductController::class)->names([
    'index' =>'seller.products.index',
    'edit' => 'seller.products.edit',
]);

Route::prefix('/seller/orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\SellerorderController::class, 'index'])->name('seller.orders.index');
    Route::get('/undone', [\App\Http\Controllers\SellerorderController::class, 'undone'])->name('seller.orders.undone');
    Route::get('/history', [\App\Http\Controllers\SellerorderController::class, 'history'])->name('seller.orders.history');
    Route::get('/detail/{order}', [\App\Http\Controllers\SellerorderController::class, 'detail'])->name('seller.products.detail');
    Route::get('/confirm/{order}', [\App\Http\Controllers\SellerorderController::class, 'confirm'])->name('seller.products.confirm');//確認訂單
    Route::get('/comment', [\App\Http\Controllers\SellerorderController::class, 'comment'])->name('seller.products.comment');//評論評分
    Route::get('/amount', [\App\Http\Controllers\SellerorderController::class, 'amount'])->name('seller.products.amount');//進帳
    Route::get('/unamount', [\App\Http\Controllers\SellerorderController::class, 'unamount'])->name('seller.products.unamount');//未進帳
    Route::get('/status/{order}/{st}', [\App\Http\Controllers\SellerorderController::class, 'orderstatus'])->name('seller.orders.status');//改變訂單狀態

});

Route::get('/exams', [\App\Http\Controllers\ExamController::class, 'index'])->name('products.exams.index');

Route::get('/products/{products}/exams/create', [\App\Http\Controllers\ExamController::class, 'create'])->name('products.exams.create');

//Route::POST('/products/{products}/exams', [\App\Http\Controllers\ExamController::class, 'store'])->name('products.exams.store');

Route::get('/exams/undone', [\App\Http\Controllers\ExamController::class, 'undone'])->name('products.exams.undone');

Route::get('/exams/finish', [\App\Http\Controllers\ExamController::class, 'finish'])->name('products.exams.finish');

Route::get('/exams/{id}', [\App\Http\Controllers\ExamController::class, 'destroy'])->name('products.exams.destroy');

Route::get('/search', [\App\Http\Controllers\ExamController::class, 'search'])->name('exams.search');
Route::get('/add', [\App\Http\Controllers\ExamController::class, 'add'])->name('exams.add');

//Route::get('/detail/{id}', [\App\Http\Controllers\SellerorderController::class, 'detail'])->name('seller.products.detail');
