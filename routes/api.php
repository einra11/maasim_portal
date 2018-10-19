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
