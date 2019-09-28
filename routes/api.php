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

/*
 * Vote
 * */
Route::get('/votes', 'VoteController@index');
Route::get('/vote/{id}', 'VoteController@show');
Route::get('/vote/{id}/edit', 'VoteController@edit');
Route::put('/vote/{id}/edit', 'VoteController@update');
Route::get('/vote/{id}/delete', 'VoteController@destroy');
