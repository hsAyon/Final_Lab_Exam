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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Root - Login
Route::get('/', 'loginController@index');
Route::post('/', 'loginController@verify');

//Register
Route::get('/register', 'registerController@index');
Route::post('/register', 'registerController@register');