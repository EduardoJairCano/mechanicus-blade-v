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

Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/about', 'AboutController')->name('about');
