<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::group(['prefix'=>'user'], function (){
        Route::get('view','UserController@index')->name('user.list');
        Route::get('create','UserController@create')->name('user.create');
        Route::post('store','UserController@store')->name('user.store');
        Route::get('edit/{id}','UserController@edit')->name('user.edit');
        Route::put('update/{id}','UserController@update')->name('user.update');
        Route::delete('destroy/{id}','UserController@destroy')->name('user.destroy');
    });
});

Route::group(['as'=>'staff.','prefix'=>'staff', 'namespace'=>'Staff', 'middleware'=>['auth','staff']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

});

Route::group(['as'=>'customer.','prefix'=>'customer', 'namespace'=>'Customer', 'middleware'=>['auth','customer']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

});


//Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']], function (){
//    Route::get('dashboard','DashboardController@index')->name('dashboard');
//
//});
