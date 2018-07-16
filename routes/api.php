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
Route::post('login', 'API\UserController@login')->name('login');
Route::post('register', 'API\UserController@register');
Route::get('viewAllImages','API\ViewImageController@index');

Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
Route::resource('contents', 'API\ContentController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
