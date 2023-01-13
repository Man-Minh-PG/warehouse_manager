<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
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


Route::group(['prefix' => '/', 'controller' => HomeController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index')->name('admin.home');
});

/*Account*/
Route::group(['controller' => UserController::class], function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'show')->name('show_login');
    Route::get('/logout', 'logout')->name('logout');
});

/*Home Page*/
Route::group(['prefix' => '_admin/home', 'controller' => HomeController::class], function(){
    //Return view
    Route::get('/', 'index')->name('admin.home');
});

/*Product*/ 
Route::group(['prefix' => '_admin/product', 'controller' => ProductsController::class], function(){
    //Return view
    Route::get('/', 'index')->name('admin.home');
    Route::get('/create', 'index')->name('admin.home.create');
    //Process create - update 

    //Process Delete

    
});

/*Product Type*/ 
Route::group(['prefix' => '_admin/product_type', 'controller' => ProductTypesController::class], function(){
    Route::get('/', 'index')->name('admin.home');
});

/*Unit Code*/ 
Route::group(['prefix' => '_admin/unit', 'controller' => UnitCodes::class], function(){
    Route::get('/', 'index')->name('admin.home');
});

/*Warehouse*/ 
Route::group(['prefix' => '_admin/warehouse', 'controller' => WarehouseController::class], function(){
    Route::get('/', 'index')->name('admin.home');
});

/*History*/ 
Route::group(['prefix' => '_admin/history', 'controller' => HistorysController::class], function(){
    Route::get('/', 'index')->name('admin.home');
});

// Route::group(['prefix' => '_admin/home', 'controller' => HomeController::class, 'middleware' => 'auth'], function(){
//     Route::get('/', 'index')->name('admin.home');
// });


/*Xem xet den truong hop*/