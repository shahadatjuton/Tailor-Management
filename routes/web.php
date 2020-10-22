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
Route::get('/','HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix'=>'profile', 'middleware'=>['auth']], function (){

    Route::get('view','ProfileController@index')->name('profile.view');
    Route::get('edit/{id}','ProfileController@edit')->name('profile.edit');
    Route::put('update/{id}','ProfileController@update')->name('profile.update');
    Route::get('password/','ProfileController@newPassword')->name('profile.newPassword');
    Route::put('password/change/','ProfileController@changePassword')->name('profile.changePassword');



});

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::group(['prefix'=>'user'], function (){
        Route::get('view','UserController@index')->name('user.index');
        Route::get('create','UserController@create')->name('user.create');
        Route::post('store','UserController@store')->name('user.store');
        Route::get('edit/{id}','UserController@edit')->name('user.edit');
        Route::put('update/{id}','UserController@update')->name('user.update');
        Route::delete('destroy/{id}','UserController@destroy')->name('user.destroy');
    });
    Route::group(['prefix'=>'category'], function (){
        Route::get('view','CategoryController@index')->name('category.index');
        Route::get('create','CategoryController@create')->name('category.create');
        Route::post('store','CategoryController@store')->name('category.store');
        Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
        Route::put('update/{id}','CategoryController@update')->name('category.update');
        Route::delete('destroy/{id}','CategoryController@destroy')->name('category.destroy');
    });
    Route::group(['prefix'=>'tag'], function (){
        Route::get('view','TagController@index')->name('tag.index');
        Route::get('create','TagController@create')->name('tag.create');
        Route::post('store','TagController@store')->name('tag.store');
        Route::get('edit/{id}','TagController@edit')->name('tag.edit');
        Route::put('update/{id}','TagController@update')->name('tag.update');
        Route::delete('destroy/{id}','TagController@destroy')->name('tag.destroy');
    });
    Route::group(['prefix'=>'dress'], function (){
        Route::get('view','DressController@index')->name('dress.index');
        Route::get('create','DressController@create')->name('dress.create');
        Route::post('store','DressController@store')->name('dress.store');
        Route::get('edit/{id}','DressController@edit')->name('dress.edit');
        Route::put('update/{id}','DressController@update')->name('dress.update');
        Route::delete('destroy/{id}','DressController@destroy')->name('dress.destroy');
        Route::get('pending/list','DressController@pendingList')->name('dress.pending');
        Route::get('show/dress/{id}','DressController@showDress')->name('dress.show');
        Route::put('accept/{id}','DressController@acceptDress')->name('dress.accept');

    });
});

Route::group(['as'=>'staff.','prefix'=>'staff', 'namespace'=>'Staff', 'middleware'=>['auth','staff']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::group(['prefix'=>'dress'], function (){
        Route::get('view','DressController@index')->name('dress.index');
        Route::get('create','DressController@create')->name('dress.create');
        Route::post('store','DressController@store')->name('dress.store');
        Route::get('edit/{id}','DressController@edit')->name('dress.edit');
        Route::put('update/{id}','DressController@update')->name('dress.update');
        Route::delete('destroy/{id}','DressController@destroy')->name('dress.destroy');
    });

});

Route::group(['as'=>'customer.','prefix'=>'customer', 'namespace'=>'Customer', 'middleware'=>['auth','customer']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');


    Route::get('cart/view/','CartController@index')->name('cart.index');
    Route::post('dress/{id}/','CartController@store')->name('cart.store');
    Route::get('cart/{id}/','CartController@destroy')->name('cart.destroy');
    Route::get('cart/clear/','CartController@clear')->name('cart.clear');

    Route::get('checkout/','CartController@checkout')->name('cart.checkout');

});

Route::get('dress/{id}','HomeController@showDress')->name('dress.show');

//Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']], function (){
//    Route::get('dashboard','DashboardController@index')->name('dashboard');
//
//});
