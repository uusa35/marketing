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
    Route::group(['middleware' => 'AdminAccessOnly'], function () {
        Route::resource('quotation', 'QuotationController', ['only' => 'destroy']);
        Route::get('send', 'QuotationController@send')->name('quotation.send');
        Route::get('accept','QuotationController@accept')->name('toggle.accept');
        Route::get('approve', 'HomeController@toggleApprove')->name('toggle.approve');
        Route::get('admin', 'HomeController@toggleAdmin')->name('toggle.admin');
        Route::get('active', 'HomeController@toggleActive')->name('toggle.active');
        Route::resource('user', 'UserController');
        Route::resource('template', 'TemplateController');
    });
});

Auth::routes();

//if (!app()->environment('production') && Schema::hasTable('users')) {
    Route::get('/logwith/{id}', function ($id) {
        Auth::loginUsingId($id);
        return redirect()->home();
    });
//}
