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

Route::get('/', function () {
    return view('auth/login'); # Iniciar en login
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], 'user/cambiarclave', 'UserController@cambiarclave');

// E-mail verificación
Route::get('/register/verificar/{code}', 'UserController@verificar');

// E-mail reenvio
Route::get('/register/reenviar', 'UserController@reenviar')->name('user.reenviar');;

Route::resource("user","UserController");

Route::resource("baja","BajaController");