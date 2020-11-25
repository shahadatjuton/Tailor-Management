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
Route::get('category/{categoryName}','HomeController@categoryWiseDress')->name('category.dress');

Route::get('/test/payment','HomeController@payment')->name('payment');
Route::get('/store/payment','HomeController@storePayment')->name('store.payment');
//Route::get('/register','HomeController@register')->name('register');
//Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
//Route::post('/logout','Auth\LoginController@logout ')->name('logout');
//Route::get('/password/confirm','Auth\ConfirmPasswordController@confirm');
//Route::get('/password.confirm','Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');

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
    Route::group(['prefix'=>'order'], function (){
        Route::get('view','OrderController@index')->name('order.index');
        Route::get('show/{id}','OrderController@show')->name('order.show');
        Route::post('store/delivery-date/','OrderController@deliveryDateStore')->name('order.store');
        Route::get('details/{id}','OrderController@orderDetails')->name('order.details');
        Route::post('size/instruction/','OrderController@sizeInstruction')->name('order.instruction');


        Route::get('create','OrderController@create')->name('order.create');
        Route::get('edit/{id}','OrderController@edit')->name('order.edit');
        Route::put('update/{id}','OrderController@update')->name('order.update');
        Route::delete('destroy/{id}','OrderController@destroy')->name('order.destroy');
        Route::get('pending/list','OrderController@pendingList')->name('order.pending');
        Route::get('accept/{id}','OrderController@acceptOrder')->name('order.accept');

    });


    Route::group(['prefix'=>'report'], function (){
        Route::get('total/order/','ReportController@totalOrder')->name('report.total.order');
        Route::get('lastWeek/order/','ReportController@lastWeek')->name('report.lastWeek.order');
        Route::get('lastMonth/order/','ReportController@lastMonth')->name('report.lastMonth.order');
        Route::get('lastYear/order/','ReportController@lastYear')->name('report.lastYear.order');

        Route::get('total/design/','ReportController@totalDesign')->name('report.total.design');
        Route::get('pending/design/','ReportController@pendingDesign')->name('report.pending.design');
        Route::get('total/staff/','ReportController@totalStaff')->name('report.total.staff');


    });

    Route::group(['prefix'=>'pdf'], function (){
        Route::get('pdf/total/order/','PdfController@totalOrder')->name('pdf.total.order');
        Route::get('pdf/lastWeek/order/','PdfController@lastWeek')->name('pdf.lastWeek.order');
        Route::get('pdf/lastMonth/order/','PdfController@lastMonth')->name('pdf.lastMonth.order');
        Route::get('pdf/lastYear/order/','PdfController@lastYear')->name('pdf.lastYear.order');

        Route::get('pdf/total/design/','PdfController@totalDesign')->name('pdf.total.design');
        Route::get('pdf/pending/design/','PdfController@pendingDesign')->name('pdf.pending.design');
        Route::get('pdf/total/staff/','PdfController@totalStaff')->name('pdf.total.staff');

        Route::get('pdf/invoice/{id}','PdfController@invoice')->name('pdf.invoice');


    });

    Route::group(['prefix'=>'settings'], function (){
        Route::get('slider/create','SettingsController@slider')->name('slider.create');
        Route::post('slider/store','SettingsController@sliderStore')->name('slider.store');
        Route::get('slider/list','SettingsController@sliderList')->name('slider.list');
        Route::get('slider/edit/{id}','SettingsController@sliderEdit')->name('slider.edit');
        Route::put('slider/update/{id}','SettingsController@sliderUpdate')->name('slider.update');
        Route::delete('delete/slider/{id}','SettingsController@sliderDestroy')->name('slider.destroy');

        Route::get('slider/status/{id}','SettingsController@active')->name('slider.active');
        Route::get('/status/slider/{id}','SettingsController@inactive')->name('slider.inactive');

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

    Route::group(['prefix'=>'order'], function (){
        Route::get('view','OrderController@index')->name('order.index');
        Route::get('show/{id}','OrderController@show')->name('order.show');
        Route::post('store/delivery-date/','OrderController@deliveryDateStore')->name('order.store');
        Route::get('details/{id}','OrderController@orderDetails')->name('order.details');
        Route::post('size/instruction/','OrderController@sizeInstruction')->name('order.instruction');

        Route::get('create','OrderController@create')->name('order.create');
        Route::get('edit/{id}','OrderController@edit')->name('order.edit');
        Route::put('update/{id}','OrderController@update')->name('order.update');
        Route::delete('destroy/{id}','OrderController@destroy')->name('order.destroy');
        Route::get('pending/list','OrderController@pendingList')->name('order.pending');
        Route::get('accept/{id}','OrderController@acceptOrder')->name('order.accept');

    });


    Route::group(['prefix'=>'report'], function (){
        Route::get('total/order/','ReportController@totalOrder')->name('report.total.order');
        Route::get('pending/order/','ReportController@pendingOrder')->name('report.pending.order');
        Route::get('design/','ReportController@ownDesign')->name('report.own.design');

    });


    Route::group(['prefix'=>'pdf'], function (){
        Route::get('pdf/total/order/','PdfController@totalOrder')->name('pdf.total.order');
        Route::get('pdf/pending/order/','PdfController@pendingOrder')->name('pdf.pending.order');
        Route::get('pdf/design/','PdfController@ownDesign')->name('pdf.own.design');

        Route::get('pdf/invoice/{id}','PdfController@invoice')->name('pdf.invoice');


    });

});

Route::group(['as'=>'customer.','prefix'=>'customer', 'namespace'=>'Customer', 'middleware'=>['auth','customer']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('/user-info/','DashboardController@customerInfo')->name('info');
    Route::post('/user-info/store','DashboardController@infoStore')->name('info.store');


    Route::get('cart/view/','CartController@index')->name('cart.index');
    Route::post('dress/{id}/','CartController@store')->name('cart.store');
    Route::get('cart/{id}/','CartController@destroy')->name('cart.destroy');
    Route::get('clear/cart/','CartController@clear')->name('cart.clear');

    Route::get('checkout/','CartController@checkout')->name('cart.checkout');
    Route::post('store/order/','CartController@order')->name('cart.order');
    Route::get('order/list/','CartController@orderList')->name('cart.order.list');
    Route::get('order/details/{id}/','CartController@orderDetails')->name('cart.order.details');
    Route::get('order/payment/{id}','CartController@payment')->name('cart.payment');
    Route::post('order/payment/store/','CartController@paymentStore')->name('cart.payment.store');
    Route::get('order/update/size/{id}','CartController@updateSize')->name('cart.order.size');
    Route::post('size/store/','CartController@storeSize')->name('cart.order.size.store');
    Route::get('order/destroy/{id}','CartController@orderDestroy')->name('order.destroy');
    Route::get('order/accept/{id}','CartController@orderAccept')->name('order.accept');


    Route::group(['prefix'=>'pdf'], function (){
        Route::get('pdf/invoice/{id}','PdfController@invoice')->name('pdf.invoice');

    });

});

Route::get('dress/{id}','HomeController@showDress')->name('dress.show');

//Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']], function (){
//    Route::get('dashboard','DashboardController@index')->name('dashboard');
//
//});
