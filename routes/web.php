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
    return view('dgrh.layouts.app');
});
 */
//uth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/', 'Auth\LoginController@login')->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', 'UserController@index');
    Route::get('/chnagepassword', 'ChangePasswordController@index');
    Route::get('/lives', 'LiveController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('/meeting/store', 'LiveController@store');
    Route::post('/meeting/join', 'LiveController@join');
    Route::get('/logout', 'Auth\LoginController@logout');
});
