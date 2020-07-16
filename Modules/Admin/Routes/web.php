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
    Route::get('index', [
        'as'=>'index',
        'uses'=>'AdminController@index'
    ])->middleware('CheckLoginAdmin');
    Route::get('/', [
        'as'=>'index',
        'uses'=>'AdminController@index'
    ])->middleware('CheckLoginAdmin');
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
    ])->middleware('CheckLoginAdmin');
    Route::get('product-detail/{id}', [
        'as'=>'product-detail',
        'uses'=>'AdminController@productdetail'
    ])->middleware('CheckLoginAdmin');
    Route::get('add_product', [
        'as'=>'add_product',
        'uses'=>'AdminController@add_product'
    ])->middleware('CheckLoginAdmin');
    Route::post('add_product', [
        'as'=>'add_product',
        'uses'=>'AdminController@post_add_product'
    ])->middleware('CheckLoginAdmin');
    Route::post('product-detail/{id}', [
        'as'=>'product-detail',
        'uses'=>'AdminController@post_update_product'
    ]);
    Route::get('order', [
        'as'=>'order',
        'uses'=>'AdminController@getorder'
    ])->middleware('CheckLoginAdmin');
    Route::get('order_detail/{id}', [
        'as'=>'order_detail',
        'uses'=>'AdminController@order_detail'
    ])->middleware('CheckLoginAdmin');
    Route::post('order_detail/{id}', [
        'as'=>'order_detail',
        'uses'=>'AdminController@order_update'
    ]);
    Route::get('customer', [
        'as'=>'customer',
        'uses'=>'AdminController@get_customer'
    ])->middleware('CheckLoginAdmin');

});


