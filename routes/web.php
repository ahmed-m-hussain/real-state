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

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('form.login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');

    //Home CRUD
    Route::get('/home/index', 'HomeController@index')->name('home.index');
    Route::get('/home/create', 'HomeController@create')->name('home.create');
    Route::post('/home/store', 'HomeController@store')->name('home.store');
    Route::get('/home/{id}/edit', 'HomeController@edit')->name('home.edit');
    Route::post('/home/update/{id}', 'HomeController@update')->name('home.update');
    Route::get('/home/{id}', 'HomeController@show')->name('home.show');
    Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');

    //Contact
    Route::get('/contact/index', 'ContactController@index')->name('contact.index');
    Route::post('/contact/update/{id}', 'ContactController@update')->name('contact.update');
    Route::get('/messages/index', 'ContactController@getMessages')->name('messages.index');

    //About
    Route::get('/about/index', 'AboutController@index')->name('about.index');
    Route::post('/about/update/{id}', 'AboutController@update')->name('about.update');

    //Services
    Route::get('/real/estate/appraisals/index', 'ServicesController@indexRealEstateAppraisals')->name('real.estate.appraisals.index');
    Route::post('/real/estate/appraisals/update/{id}', 'ServicesController@updateRealEstateAppraisals')->name('real.estate.appraisals.update');

    Route::get('/administration/index', 'ServicesController@indexAdministration')->name('administration.index');
    Route::post('/administration/update/{id}', 'ServicesController@updateAdministration')->name('administration.update');

});

Route::get('{path}', function () {
    return view('index');
})->where('path', '(.*)');
