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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//MY API REQUEST TO VUE!!!
//posts
//List
Route::get('vueannouncements', 'ApiPostController@index');
//List single
Route::get('vueannouncement/{id}', 'ApiPostController@show');
//Create
Route::post('vueannouncement', 'ApiPostController@store');
//Update
Route::put('vueannouncement', 'ApiPostController@store');
//Delete
Route::delete('vueannouncement/{id}', 'ApiPostController@destroy');

//Events
//List
Route::get('events', 'EventController@index');
//List single
Route::get('event/{id}', 'EventController@show');
//Create
Route::post('event', 'EventController@store');
//Update
Route::put('event', 'EventController@store');
//Delete
Route::delete('event/{id}', 'EventController@destroy');

//Events
//List
Route::get('apirequests', 'ApiRequestController@index');
//List single
Route::get('apirequest/{id}', 'ApiRequestController@show');
//Create
Route::post('apirequest', 'ApiRequestController@store');
//Update
Route::put('apirequest', 'ApiRequestController@store');
//Delete
Route::delete('apirequest/{id}', 'ApiRequestController@destroy');
