<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('trangchu');
});

Route::get('/trangchu', [PageController::class, 'getIndex'])->name('trangchu');
Route::get('/chitietsanpham/{id}', [PageController::class, 'getDetail'])->name('chitietsanpham');
Route::get('/dathang', [PageController::class, 'getCheckout'])->name('dathang');
Route::post('/dathang', [PageController::class, 'postCheckout'])->name('dathang.post');

Route::get('/loai-san-pham/{id}', [PageController::class, 'getProductType'])->name('loaisanpham');
Route::get('/gioi-thieu', [PageController::class, 'getAbout'])->name('gioithieu');
Route::get('/lien-he', [PageController::class, 'getContact'])->name('lienhe');
Route::post('/lien-he', [PageController::class, 'postContact'])->name('lienhe.post');
Route::get('/tim-kiem', [PageController::class, 'getSearch'])->name('search');


// Giỏ hàng
Route::get('/giohang', [CartController::class, 'getCart'])->name('giohang');
Route::get('/giohang/them/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/giohang/giam/{id}', [CartController::class, 'reduceByOne'])->name('giohang.reduce');
Route::get('/giohang/xoa/{id}', [CartController::class, 'removeItem'])->name('giohang.remove');
Route::get('/giohang/xoahet', [CartController::class, 'clearCart'])->name('giohang.clear');

Route::resource('foods', FoodController::class);

// Đăng nhập, đăng ký
Route::get('/dang-nhap', [PageController::class, 'getLogin'])->name('login');
Route::post('/dang-nhap', [PageController::class, 'postLogin'])->name('login.post');
Route::get('/dang-ky', [PageController::class, 'getSignin'])->name('signin');
Route::post('/dang-ky', [PageController::class, 'postSignin'])->name('signin.post');
Route::post('/dang-xuat', [PageController::class, 'postLogout'])->name('logout');

// Đăng nhập quản trị
Route::get('/admin/login', [AdminController::class, 'getLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'postLogin'])->name('admin.login.post');

// Quản trị
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard');
    
    // Sản phẩm
    Route::group(['prefix' => 'sanpham'], function() {
        Route::get('/list', [AdminController::class, 'getProductList'])->name('admin.product.list');
        Route::get('/add', [AdminController::class, 'getAddProduct'])->name('admin.product.add');
        Route::post('/add', [AdminController::class, 'postAddProduct'])->name('admin.product.store');
        Route::get('/edit/{id}', [AdminController::class, 'getEditProduct'])->name('admin.product.edit');
        Route::post('/edit/{id}', [AdminController::class, 'postEditProduct'])->name('admin.product.update');
        Route::get('/delete/{id}', [AdminController::class, 'getDeleteProduct'])->name('admin.product.delete');
    });

    // Loại sản phẩm
    Route::group(['prefix' => 'loaisanpham'], function() {
        Route::get('/list', [AdminController::class, 'getCategoryList'])->name('admin.category.list');
        Route::get('/add', [AdminController::class, 'getAddCategory'])->name('admin.category.add');
        Route::post('/add', [AdminController::class, 'postAddCategory'])->name('admin.category.store');
        Route::get('/delete/{id}', [AdminController::class, 'getDeleteCategory'])->name('admin.category.delete');
    });

    // Người dùng
    Route::group(['prefix' => 'user'], function() {
        Route::get('/list', [AdminController::class, 'getUserList'])->name('admin.user.list');
        Route::get('/delete/{id}', [AdminController::class, 'getDeleteUser'])->name('admin.user.delete');
    });

    // Đơn hàng
    Route::group(['prefix' => 'donhang'], function() {
        Route::get('/list', [AdminController::class, 'getOrderList'])->name('admin.order.list');
        Route::get('/detail/{id}', [AdminController::class, 'getOrderDetail'])->name('admin.order.detail');
        Route::get('/delete/{id}', [AdminController::class, 'getDeleteOrder'])->name('admin.order.delete');
    });
});

