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

    Route::group([ 'as' => 'client.', 'prefix' => 'client' ], function () {
        Route::get('', 'ClientController@index')->name('index');
        Route::get('create', 'ClientController@create')->name('create');
        Route::post('store', 'ClientController@store')->name('store');
        Route::put('{client}', 'ClientController@update')->name('update');
        Route::get('{client}/edit', 'ClientController@edit')->name('edit');
        Route::delete('{client}', 'ClientController@destroy')->name('destroy');
    });

    Route::group([ 'as' => 'employee.', 'prefix' => 'employee' ], function () {
        Route::get('', 'EmployeeController@index')->name('index');
        Route::get('create', 'EmployeeController@create')->name('create');
        Route::post('store', 'EmployeeController@store')->name('store');
        Route::put('{employee}', 'EmployeeController@update')->name('update');
        Route::get('{employee}/edit', 'EmployeeController@edit')->name('edit');
        Route::delete('{employee}', 'EmployeeController@destroy')->name('destroy');
    });

    Route::group([ 'as' => 'service.', 'prefix' => 'service' ], function () {
        Route::get('', 'ServiceController@index')->name('index');
        Route::get('create', 'ServiceController@create')->name('create');
        Route::post('store', 'ServiceController@store')->name('store');
        Route::put('{service}', 'ServiceController@update')->name('update');
        Route::get('{service}/edit', 'ServiceController@edit')->name('edit');
        Route::delete('{service}', 'ServiceController@destroy')->name('destroy');
    });

    Route::group([ 'as' => 'user.', 'prefix' => 'user' ], function () {
        Route::get('', 'UserController@index')->name('index');
        Route::get('create', 'UserController@create')->name('create');
        Route::post('store', 'UserController@store')->name('store');
        Route::put('{user}', 'UserController@update')->name('update');
        Route::get('{user}/edit', 'UserController@edit')->name('edit');
        Route::delete('{user}', 'UserController@destroy')->name('destroy');
    });
});
