<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\customer\CustomerController;

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

Route::get('/',[CustomerController::class, 'home'])->name('/');
Route::get('/contact',[CustomerController::class, 'contact'])->name('contact');
Route::get('/blog', [CustomerController::class, 'blog'])->name('blog');
Route::get('/blog-details', [CustomerController::class, 'blogDetails'])->name('blog-details');
Route::get('/products', [CustomerController::class, 'products'])->name('products');
Route::get('/product-detail', [CustomerController::class, 'productDetail'])->name('product-detail');
Route::get('/shopping-cart', [CustomerController::class, 'shoppingCart'])->name('shopping-cart');
Route::get('/checkout', [CustomerController::class, 'checkout'])->name('checkout');
Route::get('/login', [CustomerController::class, 'login'])->name('login');
Route::get('/register', [CustomerController::class, 'register'])->name('register');


Route::prefix('admin')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('admin.index');
    Route::post('/category/find', [CategoryController::class, 'find'])->name('category.find');
    Route::get('/category/trash', [CategoryController::class,'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category/{id}/forcedelete', [CategoryController::class,'forcedelete'])->name('category.forcedelete');
    Route::get('/product/trash', [ProductController::class,'trash'])->name('product.trash');
    Route::get('/product/{id}/restore', [ProductController::class,'restore'])->name('product.restore');
    Route::get('/product/{id}/forcedelete', [ProductController::class,'forcedelete'])->name('product.forcedelete');
    Route::post('/product/find', [ProductController::class, 'find'])->name('product.find');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
});
