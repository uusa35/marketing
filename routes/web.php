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

Route::group(['middleware' => 'auth', 'activeUser'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('approve', 'HomeController@toggleApprove')->name('quotation.approve');
    Route::resource('quotation', 'QuotationController', ['except' => 'destroy']);
    Route::group(['middleware' => 'adminOnly'], function () {
        Route::resource('quotation', 'QuotationController', ['only' => 'destroy']);
        Route::get('accept','QuotationController@accept')->name('quotation.accept');
        Route::get('approve', 'HomeController@toggleApprove')->name('quotation.approve');
        Route::get('admin', 'HomeController@toggleAdmin')->name('user.admin');
        Route::get('active', 'HomeController@toggleActive')->name('user.active');
        Route::resource("user", 'UserController');
    });
});

Auth::routes();
if (!app()->environment('production') && Schema::hasTable('users')) {
    Route::get('/logwith/{id}', function ($id) {
        Auth::loginUsingId($id);
        return redirect()->home();
    });
}
