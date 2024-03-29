<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stores', 'ApiController@stores');
Route::get('/storeSales/byLocation/{l}', 'ApiController@storeSalesByLocation');
Route::get('/storeSales/byDate', 'ApiController@storeSalesByDate');
Route::get('/storeSales/byId/{id}', 'ApiController@storeSalesById');
Route::get('/storeSales/today', 'ApiController@today');