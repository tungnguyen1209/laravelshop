<?php

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

Route::prefix('admin')->group(function() {
    Route::get('/', [
        'as'=>'home',
        'uses'=>'AdminController@index'
    ]);
    Route::get('index', [
        'as'=>'index',
        'uses'=>'AdminController@index'
    ]);
    Route::get('login', [
        'as'=>'login',
        'uses'=>'AdminController@getlogin'
    ]);
    Route::post('login', [
        'as'=>'login',
        'uses'=>'AdminController@postlogin'
    ]);
    Route::get('logout', [
        'as'=>'logout',
        'uses'=>'AdminController@logout'
    ]);
    Route::get('product', [
        'as'=>'product',
        'uses'=>'AdminController@getproduct'
    ]);
    Route::get('product-detail/{id}', [
        'as'=>'product-detail',
        'uses'=>'AdminController@productdetail'
    ]);
    Route::get('add_product', [
        'as'=>'add_product',
        'uses'=>'AdminController@add_product'
    ]);
});
