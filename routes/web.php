<?php

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

Route::get('/', 'RegisterController@index')->name('home');

Route::post('/', 'RegisterController@register')->name('register');

Route::get('/overview', 'RegisterController@overview')->name('overview');

// Route::post('/', 'register', array('as' => 'register', 'uses'=>'RegisterController@register');