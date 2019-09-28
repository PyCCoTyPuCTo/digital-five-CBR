<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::post('/registrate', 'ApiAuthController@registrate');

Route::post('/login', 'ApiAuthController@login');

Route::post('/logout', 'ApiAuthController@logout');

Route::post('/CheckAuth', 'ApiAuthController@isAuth');

Route::group(['middleware' => 'apiAuth'], function () {

    Route::get('/checkAuth', function (Request $request) {
        return response()->json(['id' => $request->user->id]);
    });


});
