<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('/', ['uses'=>'Admin\LiveController@index','middleware' => 'auth']);

// Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix'=>'admin'], function () {
//     Route::resource('weblive','LiveController');

// });

Route::get('/auth/login', 'Auth\AuthController@showLoginForm');
Route::post('/auth/login', 'Auth\AuthController@login');
Route::get('/auth/logout', 'Auth\AuthController@logout');

