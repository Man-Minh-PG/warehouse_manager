<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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


Route::group(['prefix' => '/', 'controller' => DashboardController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index')->name('admin.dashboard');
});

Route::group(['controller' => UserController::class], function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'show')->name('show_login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => '_admin/product', 'controller' => ProductsController::class, 'middleware' => 'checkAdmin'], function(){
    Route::get('/', 'index')->name('admin.products');
    Route::post('/add', 'store')->name('admin.store_product');
    Route::patch('/update/{product}', 'update')->name('admin.update_product');
    Route::get('/delete/{product}', 'destroy')->name('admin.destroy_product');
}); 

Route::group(['prefix' => '_admin/profile', 'controller' => UserController::class, 'middleware' => 'checkAdmin'], function(){
    Route::get('/change_password', 'edit')->name('admin.change_pass');
    Route::patch('/update','update')->name('admin.update_profile');
}); 

Route::group(['prefix' => '_admin/order', 'controller' => OrdersController::class, 'middleware' => 'checkAdmin'], function(){
    Route::get('/list', 'index')->name('admin.orders');
    Route::get('/details/{order}', 'show')->name('admin.show_orders');
    Route::delete('/clear_data', 'deleteAllOrder')->name('admin.clear_order');
});

Route::group(['prefix' => '_admin/dashboard', 'controller' => DashboardController::class, 'middleware' => 'checkAdmin'], function(){
    Route::get('/', 'index')->name('admin.dashboard');
    Route::get('/show_order_detail/{id}', 'show_detail_order')->name('admin.dashboard_detail');
});

// client
Route::group(['prefix' => 'client/order', 'controller' => UserController::class, 'middleware' => 'auth'], function(){
    Route::get('/home', 'create_order')->name('client.order');
    Route::get('/edit/{id}', 'redirect_order')->name('client.update_order');
    Route::get('/test', 'test')->name('client.ordera');
    Route::get('/show_orders', 'show_list_order')->name('client.show_list');
    Route::get('/delete_orders/{id}', 'process_delete_order')->name('client.xoa_order');
    Route::get('/update_status/{id}', 'change_status_order')->name('client.update_status');
    Route::get('/update_status_payonline/{id}', 'update_status_payonline')->name('client.update_status_payonline');

    // screen history
    Route::get('/history', 'history')->name('client.history');
    Route::get('/rollback_history/{id}', 'rollback_history')->name('client.rollback_history');

    // process order
    Route::post('/create', 'order')->name('client.create_order');
    // Route::patch('/edit/{id}', 'edit_order')->name('client.process_update_order');
    Route::patch('/edit/{id}/process', 'edit_order')->name('client.process_update_order');
    Route::post('/create_bill', 'add_order_into_database')->name('client.add_order_db');
    Route::delete('/delete/{name}', 'remove_order')->name('client.delete_order');  
    Route::delete('/delete_order_detail/{id_order_detail}', 'delete_order_detail')->name('client.delete_order_detail');
});
