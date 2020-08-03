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

Route::post('customers', 'MessageController@store')->name('messages.store');

Route::get('/quienes-somos', 'AboutController')->name('about');
