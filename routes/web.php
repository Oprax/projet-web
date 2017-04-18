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


Route::group([/*'middleware' => 'auth'*/], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('activity', 'ActivityController');
    Route::resource('activity.photos', 'PhotoController');
    Route::resource('user', 'UserController', ['except' => ['create']]);
});


require_once('routes-shop.php');

Route::group(['prefix' => 'auth'], function() {
    Auth::routes();
});

//Route::get('/home', 'HomeController@index');
