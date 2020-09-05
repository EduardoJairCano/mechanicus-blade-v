<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home')->name('home');

/* ---- User info -------------------------------------------------------------------------------------------------- */
Route::get('/userInfo', 'UserInfoController@index')->name('userInfo.index');
Route::get('/userInfo/create', 'UserInfoController@create')->name('userInfo.create');
Route::post('/userInfo', 'UserInfoController@store')->name('userInfo.store');
Route::get('/userInfo/{user}/edit', 'UserInfoController@edit')->name('userInfo.edit');
Route::patch('/userInfo/{user}', 'UserInfoController@update')->name('userInfo.update');


/* ---- Administrator ---------------------------------------------------------------------------------------------- */
Route::get('/administrator/{administrator}/show', 'AdministratorController@show')->name('administrator.show');
Route::get('/administrator/create', 'AdministratorController@create')->name('administrator.create');
Route::post('/administrator', 'AdministratorController@store')->name('administrator.store');
Route::get('/administrator/{administrator}/edit', 'AdministratorController@edit')->name('administrator.edit');
Route::patch('/administrator/{administrator}', 'AdministratorController@update')->name('administrator.update');
Route::delete('/administrator/{administrator}', 'AdministratorController@destroy')->name('administrator.destroy');


/* ---- Customer --------------------------------------------------------------------------------------------------- */
Route::get('/customer','CustomerController@index')->name('customer.index');
Route::get('/customer/{customer}/show','CustomerController@show')->name('customer.show');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer', 'CustomerController@store')->name('customer.store');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
Route::patch('/customer/{customer}', 'CustomerController@update')->name('customer.update');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('customer.destroy');


/* ---- Vehicle ---------------------------------------------------------------------------------------------------- */
Route::get('/vehicle','VehicleController@index')->name('vehicle.index');
Route::get('/vehicle/{vehicle}/show','VehicleController@show')->name('vehicle.show');
Route::get('/vehicle/create/{customer?}', 'VehicleController@create')->name('vehicle.create');
Route::post('/vehicle', 'VehicleController@store')->name('vehicle.store');
Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit');
Route::patch('/vehicle/{vehicle}', 'VehicleController@update')->name('vehicle.update');
Route::delete('/vehicle/{vehicle}', 'VehicleController@destroy')->name('vehicle.destroy');


/* ---- Employee --------------------------------------------------------------------------------------------------- */
Route::get('/employee', 'EmployeeController@index')->name('employee.index');


/* ---- Mechanicus ------------------------------------------------------------------------------------------------- */
Route::post('customers', 'MessageController@store')->name('messages.store');
Route::get('/quienes-somos', 'AboutController')->name('about');
