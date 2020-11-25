<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');

Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::group(['prefix' => '/'], function () {

    Route::get('/', 'ListItemController@index')->name('indexList');

    Route::get('list-cart', 'CartController@listCart')->name('list-cart');

    Route::get('paypal-cart', 'ListItemController@paypal')->name('paypal-cart');

    Route::get('add-cart/{id}', 'CartController@addCart')->name('add-cart');

    Route::post('submit-paypal', 'ListItemController@savePaypal')->name('submit-paypal');

    Route::get('delete-List-item-cart/{id}', 'CartController@deleteListItem')->name('delete-item-cart');

    Route::get('delete-item-cart/{id}', 'CartController@deleteItem')->name('delete-item-cart');

    Route::get('data-chart', 'DashBoardController@chartIncomeDaily')->name('data-chart');

    Route::get('data-orderAnalyticDay', 'DashBoardController@getOrderOnToday')->name('data-orderAnalyticDay');

    Route::get('data-orderAnalyticMonth', 'DashBoardController@getOrderOnMonth')->name('data-orderAnalytic');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'DashBoardController@index')->name('admin');

    Route::get('create-product', 'ProductController@create')->name('create-product');

    Route::post('create-product', 'ProductController@store')->name('create-product');

    Route::get('product/export/', 'ProductController@export')->name('product-export');

    Route::get('product/pdf/', 'ProductController@print_pdf')->name('print_pdf');

    Route::get('edit-product/{id}', 'ProductController@show')->name('edit-product');

    Route::post('edit-product/{id}', 'ProductController@edit')->name('edit-post-product');

    Route::get('search', 'ProductController@searchProduct')->name('search');

    Route::post('delete-product', 'ProductController@destroy')->name('delete-product');

    Route::get('product', 'ProductController@index')->name('product');

 
    Route::group(['prefix' => 'orders'], function () {
        // Route::get('/', 'OrderController@index')->name('orders-index');
        Route::get('showListOrders/{param}', 'ListOrdersController@show')->name('showListOrders');
        Route::get('showListOrders', 'ListOrdersController@index')->name('showListOrders');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::post('/upInfo-user={id}', 'UserController@upInfo')->name('upInfo-user');
        Route::get('/', 'UserController@index')->name('user-current');
        Route::get('/list-users', 'RoleController@showListUser')->name('list-users');
        Route::post('/set-role={id}', 'UserController@edit')->name('set-role');
        Route::post('/set-role-u={id}', 'UserController@update')->name('set-role-u');
        // Route::get('/destroy', 'UserController@destroy')->name('user-destroy');
        Route::post('/destroyUser', 'UserController@destroy')->name('destroyUser');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RoleController@index')->name('list');
        Route::get('/create', 'RoleController@create')->name('create');
        Route::get('/edit-role/{id}', 'RoleController@edit')->name('edit-role');
        Route::post('/destroy', 'RoleController@destroy')->name('destroy');
        Route::post('/create-store', 'RoleController@store')->name('create-store');
        Route::post('/update-role', 'RoleController@update')->name('update-role');
    });
});
