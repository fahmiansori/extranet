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
    'middleware' => 'checktoken'
], function()
{
    Route::group([
        'prefix' => 'dashboard',
    ], function($router){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::post('/get-report-chart-data', 'DashboardController@getReportChartData')->name('dashboard.get-report-chart-data');
        Route::get('/partner-profile', 'DashboardController@partnerProfile')->name('dashboard.partner-profile');
        Route::post('/partner-profile/save', 'DashboardController@partnerProfileSave')->name('dashboard.partner-profile.save');
    });

    Route::group([
        'namespace' => 'Hotel',
        'prefix' => 'hotel',
    ], function($router){
        Route::get('/', 'HotelController@index')->name('hotel');
        Route::get('/detail/photo/{hotel_id?}', 'HotelController@detailPhoto')->name('hotel.detail.photo');
        Route::post('/detail/photo-upload', 'HotelController@detailPhotoUpload')->name('hotel.detail.photo-upload');
        Route::get('/detail/photo-delete/{image_id?}', 'HotelController@detailPhotoDelete')->name('hotel.detail.photo-delete');
        Route::get('/detail/photo-update-primary/{image_id?}', 'HotelController@detailPhotoUpdatePrimary')->name('hotel.detail.photo-update-primary');

        Route::post('/detail/rooms/save', 'HotelController@saveRoom')->name('hotel.detail.rooms.save');
        Route::get('/detail/rooms/detail/{room_id?}', 'HotelController@detailRoom')->name('hotel.detail.rooms.detail');
        Route::get('/detail/rooms/set-inactive/{room_id?}', 'HotelController@setInactiveRoom')->name('hotel.detail.rooms.set-inactive');
        Route::get('/detail/rooms/set-active/{room_id?}', 'HotelController@setActiveRoom')->name('hotel.detail.rooms.set-active');
        Route::get('/detail/rooms/{hotel_id?}', 'HotelController@rooms')->name('hotel.detail.rooms');

        Route::get('/detail/rooms-photo/{room_id?}', 'HotelController@roomPhoto')->name('hotel.detail.rooms.photo');
        Route::post('/detail/rooms-photo-upload', 'HotelController@roomPhotoUpload')->name('hotel.detail.rooms.photo-upload');
        Route::get('/detail/rooms-photo-delete/{image_id?}', 'HotelController@roomPhotoDelete')->name('hotel.detail.rooms.photo-delete');
        Route::get('/detail/rooms-photo-update-primary/{image_id?}', 'HotelController@roomPhotoUpdatePrimary')->name('hotel.detail.rooms.photo-update-primary');

        Route::post('/detail/rooms-rates', 'HotelController@roomsRates')->name('hotel.detail.rooms.rates');
        Route::get('/detail/rooms-rates/detail/{room_rate_id?}', 'HotelController@roomsRatesDetail')->name('hotel.detail.rooms.rates-detail');
        Route::post('/detail/rooms-rates-delete', 'HotelController@roomsRatesDelete')->name('hotel.detail.rooms.rates-delete');
        Route::post('/detail/rooms-rates-save', 'HotelController@roomsRatesSave')->name('hotel.detail.rooms.rates-save');

        Route::get('/detail/{hotel_id?}', 'HotelController@detail')->name('hotel.detail');
        Route::post('/update', 'HotelController@update')->name('hotel.update');
        Route::get('/room-form', 'HotelController@roomForm')->name('hotel.room-form');
    });

    Route::group([
        'namespace' => 'Booking',
        'prefix' => 'booking',
    ], function($router){
        Route::get('/', 'BookingController@index')->name('booking');
        Route::post('/list', 'BookingController@list')->name('booking.list');
    });
});
