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
    return view('index/overview');
});
Route::resource('draft', 'DraftController');
Route::get('market', 'DraftController@market');

Route::get('overview', 'PumpController@index');