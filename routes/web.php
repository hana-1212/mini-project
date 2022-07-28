<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthFrontendController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Backend\CustomersController;

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

    Route::get('/about', function () {
    return view('Frontend.pages.about');
   });

    Route::get('/product', function () {
    return view('Frontend.pages.product');
   });

   Route::get('/product_detail', function () {
    return view('Frontend.pages.product_detail');
   });

   Route::get('/contact', function () {
    return view('Frontend.pages.contact');
   });

   Route::get('/cart', function () {
    return view('Frontend.pages.cart');
   });

   Route::get('/billing', function () {
    return view('Frontend.pages.billing');
   });

   Route::prefix('admin')->group(function()
    {
        Route::get('login',[LoginController::class,"getIndex"])->name("login");
        Route::post('login',[LoginController::class,"postLogin"])->name("loginFunction");
        Route::get('logout',[LoginController::class,"getLogout"])->name("logoutFunction");

    });
    Route::group(['prefix' => 'admin', 'middleware' => ['admin.login']], function(){
        Route::get('',[AdminController::class,"getIndex"])->name("admin");



    Route::prefix('customers')->group(function () {
        Route::get('/',[CustomersController::class,"getIndex"])->name("adminCustomers");
        Route::get('/add',[CustomersController::class,"getAdd"])->name("adminAddCustomers");
        Route::post('/add',[CustomersController::class,"postAddSave"])->name("adminAddSaveCustomers");
        Route::get('/edit/{id}',[CustomersController::class,"getEdit"])->name("adminCustomersEdit");
        Route::post('/edit/{id}',[CustomersController::class,"postEditSave"])->name("adminCustomersEditSave");
        Route::get('/detail/{id}',[CustomersController::class,"getDetail"])->name("adminCustomersDetail");
        Route::get('/delete/{id}',[CustomersController::class,"getDetele"])->name("adminCustomersDelete");
    });

    Route::prefix('products')->group(function () {
        Route::get('/',[ProductsController::class,"getIndex"])->name("adminProducts");
        Route::get('/add',[ProductsController::class,"getAdd"])->name("adminAddProducts");
        Route::post('/add',[ProductsController::class,"postAddSave"])->name("adminAddSaveProducts");
        Route::get('/edit/{id}',[ProductsController::class,"getEdit"])->name("adminProductsEdit");
        Route::post('/edit/{id}',[ProductsController::class,"postEditSave"])->name("adminProductsEditSave");
        Route::get('/detail/{id}',[ProductsController::class,"getDetail"])->name("adminProductsDetail");
        Route::get('/delete/{id}',[ProductsController::class,"getDetele"])->name("adminProductsDelete");
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrdersController::class, "getIndex"])->name("adminOrders");
        Route::get('/detail/{id}', [OrdersController::class, "getDetail"])->name("adminOrdersDetail");
        Route::get('/delete/{id}', [OrdersController::class, "getDelete"])->name("adminOrdersDelete");
    });

    Route::prefix('size')->group(function () {
        Route::get('/',[SizeController::class,"getIndex"])->name("adminSize");
        Route::get('/add',[SizeController::class,"getAdd"])->name("adminSizeAdd");
        Route::post('/add',[SizeController::class,"postAddSave"])->name("adminSizeAddSave");
        Route::get('/edit/{id}',[SizeController::class,"getEdit"])->name("adminSizeEdit");
        Route::post('/edit/{id}',[SizeController::class,"postEditSave"])->name("adminSizeEditSave");
        Route::get('/detail/{id}',[SizeController::class,"getDetail"])->name("adminSizeDetail");
        Route::get('/delete/{id}',[SizeController::class,"getDetele"])->name("adminSizeDelete");
    });

});

Route::get('/',[HomeController::class,"getIndex"])->name("homePage");
Route::get('/product',[ProductController::class,"getIndex"])->name("product");
Route::get('/product_detail/{id}',[ProductController::class,"getDetail"])->name("productDetail");
Route::post('/product_order',[ProductController::class,"postOrder"])->name("productOrder");


Route::post('login',[AuthFrontendController::class,"postLogin"])->name("loginFrontend");
Route::post('register',[AuthFrontendController::class,"postRegister"])->name("registerFrontend");
Route::get('logout',[AuthFrontendController::class,"getLogout"])->name("logoutFrontend");

Route::group(['middleware' => ['customer.login']], function(){
    Route::prefix('cart')->group(function () {
        Route::get('/', [OrderController::class, "getCart"])->name("cart");
        Route::get('/remove/{id}', [OrderController::class, "getRemove"])->name("cartRemove");
    });

    Route::get('/billing', [OrderController::class, "getCheckout"])->name("billing");
    Route::post('/checkout', [OrderController::class, "postCheckout"])->name("checkout");

});










