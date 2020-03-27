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
    return view('dgrh.layouts.app');
});

Auth::routes();

Route::get('/users', 'UserController@index');
Route::get('/lives', 'LiveController@index');

Route::get('/home', 'HomeController@index')->name('home');