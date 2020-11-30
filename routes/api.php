<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('api')->group(function () {
    Route::get('/users', 'UsersController@index');
    Route::post('/users', 'UsersController@create');
    Route::get('/users/{id}', 'UsersController@show');

    Route::get('/cep/{cep}', 'CepController@show');

    Route::get('/channels', 'ChannelUserMessageController@index');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
