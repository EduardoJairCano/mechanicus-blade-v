<?php

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

Route::get('/', static function() {
    return view('login');
})->name('login');

Route::get('/home/{username?}', static function ($username = 'usuario') {
    return view('home', [
        'username' => $username,
    ]);
})->name('home');

Route::get('/clientes', 'CustomerController@index')->name('customers.index');
Route::get('/clientes/crear', 'CustomerController@create')->name('customers.create');
Route::get('/clientes/{customer}/editar', 'CustomerController@edit')->name('customers.edit');
Route::post('/clientes', 'CustomerController@store')->name('customers.store');
Route::patch('/clientes/{customer}', 'CustomerController@update')->name('customers.update');
Route::get('/clientes/{customer}', 'CustomerController@show')->name('customers.show');
Route::post('customers', 'MessageController@store')->name('messages.store');

Route::get('/quienes-somos', 'AboutController')->name('about');
