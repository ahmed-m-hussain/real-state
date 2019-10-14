<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('v1')->group(function () {
    Route::get('/homes', 'Web\HomeController@index');
    Route::get('/homes/{id}', 'Web\HomeController@show');
    Route::post('send/email', 'Web\HomeController@sendEmail');
    Route::get('/about', 'Web\AboutController@index');
    Route::get('/administration', 'Web\AdministrationController@index');
    Route::get('/service', 'Web\ServiceController@index');
    Route::get('/contact', 'Web\ContactController@index');
    Route::post('/contact', 'Web\ContactController@sendContact');
});
