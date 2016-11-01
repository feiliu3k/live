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

Route::get('/', function () {
    return redirect('admin/weblive');
});
Route::post('upload/uploadImgFile', 'HomeController@uploadImgFile');

Route::group(['namespace'=>'Admin','middleware'=>'auth'],function(){

    Route::resource('admin/weblive', 'LiveController', ['except' => 'show']);

    Route::get('admin/liveinfo/index/{liveid}','LiveInfoController@index');

    Route::resource('admin/liveinfo', 'LiveInfoController', ['except' => ['show','index']]);

    Route::resource('admin/viewrecord', 'ViewRecordController', ['except' => 'show']);
});

Route::get('login','Auth\AuthController@showLoginForm');
Route::post('login','Auth\AuthController@login');
Route::get('logout','Auth\AuthController@logout');
Route::get('resetpassword','HomeController@resetPassword');
Route::post('changepassword','HomeController@changePassword');
