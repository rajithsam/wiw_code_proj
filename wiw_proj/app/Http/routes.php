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

Route::get('/','DemoController@index');

Route::group(['middleware' => ['b.auth']], function(){
  Route::get('/employee/shifts', 'EmployeeController@getShifts');
  Route::get('/employee/shift/{shift}','EmployeeController@getShift');
  Route::get('/employee/hours','EmployeeController@getHours');
  Route::get('/employee/contact','EmployeeController@getManagers');
  Route::get('/employee/contact/{shift}','EmployeeController@getManagerByShift');
});

Route::group(['middleware' => ['b.auth','b.auth.manager']], function() {
  Route::get('/manager/shifts/new','ManagerController@newShift');
  Route::post('/manager/shifts','ManagerController@createShift');
  Route::get('/manager/shifts','ManagerController@getShifts');
  Route::get('/manager/shift/{shift}','ManagerController@getShift');
  Route::put('/manager/shift/{shift}','ManagerController@editShift');
  Route::get('/manager/contact','ManagerController@getEmployees');
  Route::get('/manager/contact/{employee}','ManagerController@getEmployee');
});
