<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ManageCustomerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\UserController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\customer\WishlistController;


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

Route::get('/',[CustomerController::class, 'home'])->name('index');
Route::get('/contact',[CustomerController::class, 'contact'])->name('contact');
Route::get('/about',[CustomerController::class, 'about'])->name('about');
Route::get('/blog', [CustomerController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [CustomerController::class, 'blogDetails'])->name('blog-detail');
Route::get('/products', [CustomerController::class, 'products'])->name('products');
Route::post('/products', [CustomerController::class, 'products']);
Route::get('/product-detail/{slug}', [CustomerController::class, 'productDetail'])->name('product-detail');
Route::get('/ajax-search-product',[CustomerController::class,'ajaxSearch'])->name('ajaxSearchProduct');
Route::post('/productsearch', [CustomerController::class, 'productsearch'])->name('productseach');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postlogin']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'create']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::prefix('customer')->middleware('cus')->group(function () {
    Route::get('/userProfile/{id}', [UserController::class, 'userProfile'])->name('userProfile');
    Route::get('/change-password/{id}', [UserController::class, 'changePasswordIndex'])->name('changePassword.index');
    Route::post('/change-password/{id}',[UserController::class, 'changePassword'])->name('changePassword');
    Route::get('/edit-userProfile/{id}',[UserController::class, 'editprofile'])->name('editProfile');
    Route::post('/update-userProfile/{id}',[UserController::class, 'updateprofile'])->name('updateProfile');
    Route::get('/order-detail/{id}',[UserController::class, 'orderDetail'])->name('orderDetail');
    Route::get('/cancel-order/{id}}',[UserController::class, 'cancelorder'])->name('cancelorder');
    Route::post('/wishlist/add',[WishlistController::class, 'addProductToWishList'])->name('WishList.store');
    Route::get('/wishlist-count',[WishlistController::class, 'getWishListCount'])->name('WishList.count');
    Route::get('/wishlist-product',[WishlistController::class, 'WishList'])->name('WishList.index');
    Route::get('/wishlist-delete/{id}',[WishlistController::class, 'wishlistdelete'])->name('WishList.delete');
});

Route::post('add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('remove-item-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/postcheckout', [OrderController::class, 'postcheckout'])->name('post.checkout');
Route::get('/checkout-success',[OrderController::class, 'success'])->name('checkout.success');

Route::prefix('admin')->middleware('adminAuth')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('admin.index');
    Route::get('/category/find', [CategoryController::class, 'find'])->name('category.find');
    Route::get('/category/trash', [CategoryController::class,'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category/{id}/forcedelete', [CategoryController::class,'forcedelete'])->name('category.forcedelete');
    Route::get('/product/trash', [ProductController::class,'trash'])->name('product.trash');
    Route::get('/product/{id}/restore', [ProductController::class,'restore'])->name('product.restore');
    Route::get('/product/{id}/forcedelete', [ProductController::class,'forcedelete'])->name('product.forcedelete');
    Route::get('/product/find', [ProductController::class, 'find'])->name('product.find');
    Route::get('/banner/trash', [BannerController::class,'trash'])->name('banner.trash');
    Route::get('/banner/find', [BannerController::class, 'find'])->name('banner.find');
    Route::get('/banner/{id}/restore', [BannerController::class,'restore'])->name('banner.restore');
    Route::get('/banner/{id}/forcedelete', [BannerController::class,'forcedelete'])->name('banner.forcedelete');
    Route::get('/blog/find', [BlogController::class, 'find'])->name('blog.find');
    Route::get('/blog/trash', [BlogController::class,'trash'])->name('blog.trash');
    Route::get('/blog/{id}/restore', [BlogController::class,'restore'])->name('blog.restore');
    Route::get('/blog/{id}/forcedelete', [BlogController::class,'forcedelete'])->name('blog.forcedelete');
    Route::get('/order.list',[AdminOrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}/edit',[AdminOrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/{id}/update',[AdminOrderController::class, 'update'])->name('order.update');
    Route::get('/order/{id}/detail',[AdminOrderController::class, 'detail'])->name('order.detail');
    Route::get('/order/find',[AdminOrderController::class, 'find'])->name('order.find');
    Route::get('/customer',[ManageCustomerController::class,'index'])->name('admin.customer.index');
    Route::get('/customer/find',[ManageCustomerController::class,'find'])->name('admin.customer.find');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('blog', BlogController::class);
   
});
Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
Route::post('/logon', [AdminController::class, 'postlogon']);
Route::get('/logoutadmin', [AdminController::class, 'adminlogout'])->name('admin.logout');