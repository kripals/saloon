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
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::group([ 'prefix' => '/', 'middleware' => 'auth' ], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group([ 'as' => 'branch.', 'prefix' => 'branch' ], function () {
        Route::get('', 'BranchController@index')->name('index');
        Route::get('create', 'BranchController@create')->name('create');
        Route::post('store', 'BranchController@store')->name('store');
        Route::put('{branch}', 'BranchController@update')->name('update');
        Route::get('{branch}/edit', 'BranchController@edit')->name('edit');
        Route::delete('{branch}', 'BranchController@destroy')->name('destroy');
    });

    Route::group([ 'as' => 'user.', 'prefix' => 'user' ], function () {
        Route::get('', 'UserController@index')->name('index');
        Route::get('create', 'UserController@create')->name('create');
        Route::post('store', 'UserController@store')->name('store');
        Route::put('{user}', 'UserController@update')->name('update');
        Route::get('{user}/edit', 'UserController@edit')->name('edit');
        Route::delete('{user}', 'UserController@destroy')->name('destroy');
        Route::put('{user}/publish', 'UserController@publishUpdate')->name('publish');
    });
});
