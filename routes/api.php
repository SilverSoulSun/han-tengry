<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('animals/search/{keyword}','Api\AnimalController@search');
Route::post('add_email','Api\SubscriptionController@add_email');
Route::resource('animals', 'Api\AnimalController');
Route::resource('photos', 'Api\PhotoController');





