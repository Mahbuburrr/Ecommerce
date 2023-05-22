<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\Admin\DashboardController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontController::class,'index']);


Route::get('/category',[FrontController::class,'category']);
Route::get('/product-list',[FrontController::class,'productlist']);
Route::post('/searchproduct',[FrontController::class,'searchproduct']);
Route::get('/view-category/{slug}',[FrontController::class,'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}',[FrontController::class,'productview']);
Route::get('/category/{prod_slug}',[FrontController::class,'view']);

Route::post('/add-to-cart',[CartController::class,'addproduct']);
Route::get('/load-cart-data',[CartController::class,'cartcount']);
Route::post('/delete-cart-item',[CartController::class,'deleteproduct']);
Route::post('/update-cart',[CartController::class,'updatecart']);
Route::post('/add-to-wishlist',[WishlistController::class,'add']);
Route::get('/load-wishlist-data',[WishlistController::class,'wishlistcount']);
Route::post('/remove-wishlist-item',[WishlistController::class,'destroy']);

Auth::routes();
Route::middleware(['auth'])->group(function(){

Route::get('/cart',[CartController::class,'viewcart']);
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/place-order',[CheckoutController::class,'placeorder']);
Route::post('/proceed-to-pay',[CheckoutController::class,'razorpaycheck']);
Route::get('/my-orders',[UserController::class,'index']);
Route::get('/view-order/{id}',[UserController::class,'view']);
Route::get('/wishlist',[WishlistController::class,'index']);
Route::post('add-rating',[RatingController::class,'addrate']);
Route::get('add-review/{product_slug}/userview',[ReviewController::class,'add']);
Route::post('add-review',[ReviewController::class,'create']);
Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);
Route::post('update-review',[ReviewController::class,'update']);
 

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



 Route::middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard',[FrontendController::class,'index']);
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/add-category',[CategoryController::class,'add']);
    Route::post('/insert-category',[CategoryController::class,'insert']);
    Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
    Route::post('/update-category/{id}',[CategoryController::class,'update']);
    Route::get('/delete-category/{id}',[CategoryController::class,'delete']);
    Route::get('/products',[ProductController::class,'first']);
    Route::get('/add-products',[ProductController::class,'add']);
    Route::post('/insert-products',[ProductController::class,'insert']);
    Route::get('/edit-product/{id}',[ProductController::class,'edit']);
    Route::post('/update-products/{id}',[ProductController::class,'update']);
    Route::get('/delete-product/{id}',[ProductController::class,'destroy']);

    Route::get('orders',[OrderController::class,'index']);
    Route::get('admin/view-order/{id}',[OrderController::class,'view']);
    Route::post('update-order/{id}',[OrderController::class,'updateorder']);
    Route::get('order-history',[OrderController::class,'orderhistory']);
    Route::get('users',[DashboardController::class,'users']);
    Route::get('view-user/{id}',[DashboardController::class,'viewuser']);
    

    
 });