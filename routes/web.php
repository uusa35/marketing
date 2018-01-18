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

Route::group(['middleware' => ['auth', 'ActiveUser']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('approve', 'HomeController@toggleApprove')->name('quotation.approve');
    Route::resource('quotation', 'QuotationController', ['except' => 'destroy']);
    Route::get('send', 'QuotationController@send')->name('quotation.send');
    Route::group(['middleware' => 'AdminAccessOnly'], function () {
        Route::resource('quotation', 'QuotationController', ['only' => 'destroy']);
        Route::get('accept', 'QuotationController@accept')->name('toggle.accept');
        Route::get('approve', 'HomeController@toggleApprove')->name('toggle.approve');
        Route::get('admin', 'HomeController@toggleAdmin')->name('toggle.admin');
        Route::get('active', 'HomeController@toggleActive')->name('toggle.active');
        Route::resource('user', 'UserController');
        Route::resource('template', 'TemplateController');
        Route::get('backend/reset/password/{id}', 'UserController@getResetPassword');
        Route::post('backend/reset/password', 'UserController@postResetPassword');
    });
});

Auth::routes();


Route::get('/logwith/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect()->to('/quotation/create');
});



//        MAIL_DRIVER="smtp"
//MAIL_HOST="smtp.webfaction.com"
//MAIL_PORT=587
//MAIL_USERNAME=sales_ideasowners
//MAIL_PASSWORD=I123123i@
//    MAIL_ENCRYPTION=tls
//MAIL_FROM_ADDRESS=sales@ideasowners.net
//MAIL_FROM_NAME=ideasowners