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

Route::group([
    'namespace' => 'Auth',
], function($router)
{
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@login')->name('login-submit');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/forgot-password', 'LoginController@forgotPassword')->name('forgot-password');
    Route::post('/forgot-password', 'LoginController@forgotPasswordProcess')->name('forgot-password');
});

Route::group([
    'namespace' => 'Hotel',
    'prefix' => 'hotel',
    'middleware' => 'checktoken'
], function($router)
{
    Route::get('/', 'HotelController@index')->name('hotel');
});
