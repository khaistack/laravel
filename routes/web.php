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

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'DashBoardController@index')->name('admin');

    Route::get('create-product', 'ProductController@create')->name('create-product');

    Route::post('create-product', 'ProductController@store')->name('create-product');

    Route::get('product/export/', 'ProductController@export')->name('product-export');
    
    Route::get('product/pdf/', 'ProductController@print_pdf')->name('print_pdf');

    Route::get('edit-product/{id}', 'ProductController@show')->name('edit-product');

    Route::post('edit-product/{id}', 'ProductController@edit')->name('edit-port-product');

    Route::get('search', 'ProductController@searchProduct')->name('search');
    
    Route::post('delete-product', 'ProductController@destroy')->name('delete-product');

    Route::get('product', 'ProductController@index')->name('product');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');
});