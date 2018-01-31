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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('tokens', 'TokenController');
Route::get('market', 'DraftController@market');

Route::get('overview/{id}', 'PumpController@index');
Route::get('record', 'PumpController@record');