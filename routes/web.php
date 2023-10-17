<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('admin.index');
    Route::get('/category/trash', [CategoryController::class,'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category/{id}/forcedelete', [CategoryController::class,'forcedelete'])->name('category.forcedelete');
    Route::get('/product/trash', [ProductController::class,'trash'])->name('product.trash');
    Route::get('/product/{id}/restore', [ProductController::class,'restore'])->name('product.restore');
    Route::get('/product/{id}/forcedelete', [ProductController::class,'forcedelete'])->name('product.forcedelete');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});
