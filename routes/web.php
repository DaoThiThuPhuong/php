<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\member\homememberController;
use App\Http\Controllers\staff\homestaffController;
use App\Http\Controllers\staff\userController;
use App\Http\Controllers\staff\orderController;
use App\Http\Controllers\member\cartController;
use App\Http\Controllers\admin\homeadminController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\voucherController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\colorController;
use App\Http\Controllers\admin\imageController;
use App\Http\Controllers\authController;


use App\Http\Middleware\checkRoleAdmin;
use App\Http\Middleware\checkRoleUser;
use App\Http\Middleware\checkRoleStaff;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;


//guest can access
Route::get('/', [homememberController::class, 'index']);
Route::get('/product', [homememberController::class, 'product']);

Route::get('/order', [homememberController::class, 'order']);
Route::get('/order/{id}', [orderController::class, 'getOrderDetailForClient']);

Route::get('/detail/{id}', [homememberController::class, 'detail']);
Route::get('/about', [homememberController::class, 'about']);
Route::get('/benhvemat', [homememberController::class, 'benhvemat']);
Route::get('/goctuvan', [homememberController::class, 'goctuvan']);
Route::get('/tintucveVENUS', [homememberController::class, 'tintucveVENUS']);
Route::get('/kienthucchung', [homememberController::class, 'kienthucchung']);
Route::get('/sale', [homememberController::class, 'sale']);
Route::post('/search', [homememberController::class, 'search']);
Route::get('/category/{id}', [homememberController::class, 'category']);


//only member access
Route::middleware([checkRoleUser::class])->group(function () {
    Route::post('/detail/{id}', [cartController::class, 'add']);
    Route::get('/cart/{id}', [cartController::class, 'delCartItem']);
    Route::post('/cart/update/{id}', [cartController::class, 'updateCartQuantity']);
    Route::get('/cart', [homememberController::class, 'cart']);
    Route::get('/cart/checkout', [cartController::class, 'checkout']);
});








//cant access after login
Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/auth', [authController::class, 'auth']);
    Route::post('/register', [authController::class, 'register']);
    Route::post('/login', [authController::class, 'login']);
    });




//only access after login
Route::get('/logout', [authController::class, 'logout'])->middleware([RedirectIfNotAuthenticated::class]);



//only staff access
Route::prefix('staff')->middleware([checkRoleStaff::class])->group(function () {
    Route::get('/', [homestaffController::class, 'index']);
    Route::get('/user', [homestaffController::class, 'user']);
    Route::get('/order', [homestaffController::class, 'order']);
    Route::get('/order/{id}', [orderController::class, 'getOrderDetail']);
    Route::post('/order/{id}', [orderController::class, 'changeStatus']);
    Route::get('/user/lock/{id}', [userController::class, 'lockUser']);
    Route::get('/user/restore/{id}', [userController::class, 'unLockUser']);
});


//only admin access
Route::prefix('admin')->middleware([checkRoleAdmin::class])->group(function () {
    Route::get('/', [homeadminController::class, 'index']);
    Route::get('/category', [homeadminController::class, 'category']);
    Route::post('/category', [categoryController::class, 'store']);
    Route::post('/category/{id}', [categoryController::class, 'update']);
    Route::get('/category/lock/{id}', [categoryController::class, 'lock']);
    Route::get('/category/restore/{id}', [categoryController::class, 'unLock']);

    
    Route::get('/product', [homeadminController::class, 'product']);
    Route::get('/product/add', [productController::class, 'add']);
    Route::post('/product/add', [productController::class, 'store']);
    Route::get('/product/{id}', [productController::class, 'detailProduct']);
    Route::post('/product/{id}', [productController::class, 'update']);
    Route::get('/product/lock/{id}', [productController::class, 'lock']);
    Route::get('/product/restore/{id}', [productController::class, 'unLock']);


    Route::post('/product/{id}/color', [colorController::class, 'store']);
    Route::post('/product/{id}/image', [imageController::class, 'store']);
    Route::get('/image/delete/{id}', [imageController::class, 'delete']);
    Route::post('/image/{id}', [imageController::class, 'update']);
    Route::post('/color/{id}', [colorController::class, 'update']);
    Route::get('/color/lock/{id}', [colorController::class, 'lock']);
    Route::get('/color/restore/{id}', [colorController::class, 'unLock']);


    Route::get('/user', [homestaffController::class, 'user']);
    Route::get('/admin/staff', [authController::class, 'staff']);
    Route::get('/staff', [authController::class, 'index']);
    Route::get('/staff/lock/{id}', [authController::class, 'lockUser']);
    Route::get('/staff/restore/{id}', [authController::class, 'unLockUser']);

    

    Route::get('/order', [homestaffController::class, 'order']);
    Route::get('/order/{id}', [orderController::class, 'getOrderDetail']);
    Route::post('/order/{id}', [orderController::class, 'changeStatus']);
    Route::get('/user', [userController::class, 'index']); // Thêm route để hiển thị danh sách khách hàng
    Route::get('/user/lock/{id}', [userController::class, 'lockUser']);
    Route::get('/user/restore/{id}', [userController::class, 'unLockUser']);
    

    Route::get('/voucher', [homeadminController::class, 'voucher']);
    Route::post('/voucher', [voucherController::class, 'store']);
    Route::post('/voucher/{id}', [voucherController::class, 'update']);
    Route::get('/voucher/lock/{id}', [voucherController::class, 'lock']);
    Route::get('/voucher/restore/{id}', [voucherController::class, 'unLock']);

});