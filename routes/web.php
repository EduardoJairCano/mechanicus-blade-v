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

Route::resource('cliente', 'CustomerController')
    ->parameters(['cliente' => 'customer'])
    ->names('customers')
    ->middleware('auth');

Route::get('/userInfo', 'UserInfoController@index')->name('userInfo.index');
Route::get('/userInfo/create', 'UserInfoController@create')->name('userInfo.create');
Route::post('/userInfo', 'UserInfoController@store')->name('userInfo.store');
Route::get('/userInfo/{user}/edit', 'UserInfoController@edit')->name('userInfo.edit');
Route::patch('/userInfo/{user}', 'UserInfoController@update')->name('userInfo.update');

Route::get('/administrator/{administrator}/show', 'AdministratorController@show')->name('administrator.show');
Route::get('/administrator/create', 'AdministratorController@create')->name('administrator.create');
Route::post('/administrator', 'AdministratorController@store')->name('administrator.store');
Route::get('/administrator/{administrator}/edit', 'AdministratorController@edit')->name('administrator.edit');
Route::patch('/administrator/{administrator}', 'AdministratorController@update')->name('administrator.update');
Route::delete('/administrator/{administrator}', 'AdministratorController@destroy')->name('administrator.destroy');

Route::post('customers', 'MessageController@store')->name('messages.store');

Route::get('/employee', 'EmployeeController@index')->name('employee.index');

Route::get('/quienes-somos', 'AboutController')->name('about');
