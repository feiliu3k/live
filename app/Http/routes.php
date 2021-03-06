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

// Route::get('/', function () {
//     return redirect('admin/weblive');
// });

Route::get('','HomeController@index');

Route::post('upload/uploadImgFile', 'HomeController@uploadImgFile');

Route::group(['namespace'=>'Admin','middleware'=>'auth'],function(){

    Route::resource('admin/weblive', 'LiveController', ['except' => 'show']);

    Route::resource('admin/weblive/{liveid}/liveinfo', 'LiveInfoController', ['except' => 'show']);

    Route::get('admin/weblive/{liveid}/visitors', 'VisitorController@index');
    Route::post('admin/visitor/delete', 'VisitorController@delete');

    Route::post('admin/comment/destroy','CommentController@destroy');
    Route::post('admin/comment/verify', 'CommentController@verify');
    Route::get('admin/weblive/{liveid}/comments', 'LiveController@comments');

});

Route::get('login','Auth\AuthController@showLoginForm');
Route::post('login','Auth\AuthController@login');
Route::get('logout','Auth\AuthController@logout');
Route::get('resetpassword','HomeController@resetPassword');
Route::post('changepassword','HomeController@changePassword');
