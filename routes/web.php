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
    Route::get('/', ['as' => 'welcome', function () {
        return view('welcome');
    }]);

    Route::resource('activity', 'ActivityController');
    Route::resource('activity.photos', 'PhotoController');
    Route::resource('user', 'UserController', ['except' => ['create']]);
});


require_once('routes-shop.php');

Route::group(['prefix' => 'auth'], function() {
    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});

//Route::get('/home', 'HomeController@index');
