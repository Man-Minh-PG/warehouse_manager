<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductTypesController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\HistorysController;
use App\Http\Controllers\UnitCodesController;
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

/*Default*/
Route::group(['prefix' => '/', 'controller' => HomeController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index');
});

/*Login*/
Route::group(['controller' => LoginController::class], function(){
    Route::get('/login', 'index')->name('login');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/authenticate', 'authenticate')->name('authenticate');
});

/*Home Page*/
Route::group(['prefix' => '_admin/home', 'controller' => HomeController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index')->name('admin.home');
});

/*Product*/
Route::group(['prefix' => '_admin/product', 'controller' => ProductsController::class, 'middleware' => 'auth'], function(){
    //Process view  
    Route::get('/', 'index')->name('admin.product');
    Route::get('/create', 'create')->name('admin.product.create');
    Route::get('/edit/{id}', 'edit')->name('admin.product.edit');
    Route::get('/show/{id}', 'show')->name('admin.product.show');
    //Process create - update 
    Route::post('/store', 'store')->name('admin.product.store');
    Route::post('/update/{id}','update')->name('admin.product.update');
    //Process Delete
    Route::delete('/destroy/{id}', 'destroy')->name('admin.product.destroy');
});

/*Product Type*/ 
Route::group(['prefix' => '_admin/product_type', 'controller' => ProductTypesController::class, 'middleware' => 'auth'], function(){
    //Process view
    Route::get('/', 'index')->name('admin.product_type');
    Route::get('/create', 'create')->name('admin.product_type.create');
    Route::get('/edit/{id}', 'edit')->name('admin.product_type.edit');
    //Process create - update 
    Route::post('/store', 'store')->name('admin.product_type.store');
    Route::post('/update/{id}','update')->name('admin.product_type.update');
    //Process Delete
    Route::delete('/destroy/{id}', 'destroy')->name('admin.product_type.destroy');
});

/*Unit Code*/ 
Route::group(['prefix' => '_admin/unit', 'controller' => UnitCodesController::class, 'middleware' => 'auth'], function(){
    //Process view
    Route::get('/', 'index')->name('admin.unit');
    Route::get('/create', 'create')->name('admin.unit.create');
    Route::get('/edit/{id}', 'edit')->name('admin.unit.edit');
    //Process create - update 
    Route::post('/store', 'store')->name('admin.unit.store');
    Route::post('/update/{id}','update')->name('admin.unit.update');
    //Process Delete
    Route::delete('/destroy/{id}', 'destroy')->name('admin.unit.destroy');
});

/*Warehouse*/ 
Route::group(['prefix' => '_admin/warehouse', 'controller' => WarehouseController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index')->name('admin.warehouse');
    Route::get('/import_product', 'import_product')->name('admin.warehouse.import_product');
    Route::get('/export_product', 'export_product')->name('admin.warehouse.export_product');
    Route::get('/show', 'show')->name('admin.warehouse.show');

});

/*History*/ 
Route::group(['prefix' => '_admin/history', 'controller' => HistorysController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index')->name('admin.history');
});
