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


    Route::group(['prefix' => 'closed_question/{id}'], function () {

        Route::post('/set_answer', 'ClosedQuestionsController@setAnswer');
        Route::get('/', 'ClosedQuestionsController@getQuestion');

    });

    Route::group(['prefix' => 'user_statistics'], function () {

        Route::get('/get_basic_user_data', 'Statistics@GetBasicUserData');

        Route::get('/count_closed_votes', 'Statistics@CountClosedVotes');
    });

    Route::group(['prefix' => 'votes'], function () {

        Route::get('/votes', 'VoteController@index');
        Route::get('/vote/{id}', 'VoteController@show');
        Route::get('/vote/{id}/edit', 'VoteController@edit');
        Route::put('/vote/{id}/edit', 'VoteController@update');
        Route::get('/vote/{id}/delete', 'VoteController@destroy');

    });


    Route::get('/checkAuth', function (Request $request) {
        return response()->json(['id' => $request->user->id]);
    });


});

