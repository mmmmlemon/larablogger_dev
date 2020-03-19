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
    return view('home');
});

Route::get('/videos', function () {
    return view('videos');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/control', 'ControlPanelController@index')->name('control');
    Route::post('/control/update_settings', 'ControlPanelController@update_settings');
    Route::post('/control/update_social', 'ControlPanelController@update_social');
    Route::post('/control/change_user_type', 'ControlPanelController@change_user_type');
    Route::post('/control/update_profile', 'ControlPanelController@update_profile');
});


Auth::routes();


