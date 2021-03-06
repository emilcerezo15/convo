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

Route::get('/', function () { return view('welcome'); });

Route::get('/home',   'UserController@home');

Route::get('/getUsers',   'UserController@getUsers');

Route::get('/getThread',   'UserController@getThread');

Route::get('/login',   'UserController@login');

Route::get('/validateUser',   'UserController@validateUser')->name('validateUser');