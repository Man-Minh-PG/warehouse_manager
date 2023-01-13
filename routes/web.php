<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::group(['prefix' => '/', 'controller' => HomeController::class, 'middleware' => 'auth'], function(){
    Route::get('/', 'index')->name('admin.home');
});

Route::group(['controller' => UserController::class], function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'show')->name('show_login');
    Route::get('/logout', 'logout')->name('logout');
});

// Route::group(['prefix' => '_admin/home', 'controller' => HomeController::class, 'middleware' => 'auth'], function(){
//     Route::get('/', 'index')->name('admin.home');
// });

Route::group(['prefix' => '_admin/home', 'controller' => HomeController::class], function(){
    Route::get('/', 'index')->name('admin.home');
});