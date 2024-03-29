<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('report/appointment/list', 'ReportController@appointmentList')->name('report.appointment.list');
Route::post('client/list', 'ClientController@clientList')->name('client.list');
Route::post('employee/list', 'EmployeeController@employeeList')->name('employee.list');
