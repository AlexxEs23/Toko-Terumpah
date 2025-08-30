<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('index');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [App\Http\Controllers\AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/loginPost', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('loginPost');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('/user-logout', [App\Http\Controllers\AuthController::class, 'userLogout'])->name('user.logout');

//Produk

Route::prefix('/admin/produk')->group(function () {
    Route::get('/data_product', [App\Http\Controllers\HomeController::class, 'dataProduct'])->name('admin.dataProduct');
    Route::post('/addProductProcess', [App\Http\Controllers\HomeController::class, 'addProductProcess'])->name('admin.addProductProcess');
    Route::get('/add_product', [App\Http\Controllers\HomeController::class, 'addProduct'])->name('admin.addProduct');
    Route::get('/update_product/{id}', [App\Http\Controllers\HomeController::class, 'updateProduct'])->name('admin.updateProduct');
    Route::post('/updateProductProcess/{id}', [App\Http\Controllers\HomeController::class, 'updateProductProcess'])->name('admin.updateProductProcess');
    Route::delete('/delete_product/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct'])->name('admin.deleteProduct');
});

//User Management
Route::prefix('/admin/user')->group(function () {
    Route::get('/data_user', [App\Http\Controllers\AuthController::class, 'dataUser'])->name('admin.dataUser');
    Route::delete('/delete_user/{id}', [App\Http\Controllers\AuthController::class, 'deleteUser'])->name('admin.deleteUser');
});

Route::prefix('/admin/order')->group(function () {
    Route::get('/data_order', [App\Http\Controllers\OrderController::class, 'dataOrder'])->name('admin.dataOrder');
    Route::get('/create_order', [App\Http\Controllers\OrderController::class, 'createOrder'])->name('admin.createOrder');
    Route::post('/store_order', [App\Http\Controllers\OrderController::class, 'storeOrder'])->name('admin.storeOrder');
    Route::post('/update_status/{id}', [App\Http\Controllers\OrderController::class, 'updateOrderStatus'])->name('admin.updateOrderStatus');
    Route::delete('/delete_order/{id}', [App\Http\Controllers\OrderController::class, 'deleteOrder'])->name('admin.deleteOrder');
});

//  User Order Routes
Route::middleware('auth')->group(function () {
    Route::post('/order', [App\Http\Controllers\OrderController::class, 'userStoreOrder'])->name('user.storeOrder');
    Route::get('/my-orders', [App\Http\Controllers\OrderController::class, 'userOrders'])->name('user.orders');
    Route::get('/order-success/{id}', [App\Http\Controllers\OrderController::class, 'orderSuccess'])->name('user.orderSuccess');
});