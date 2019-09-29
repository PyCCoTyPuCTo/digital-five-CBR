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
    return view('welcome');
});


Route::post('/savedata', function (\Illuminate\Http\Request $request) {

    $vote = new \App\Vote();
    $vote->title = $request->title;
    $vote->description = $request->text;
    $vote->finish_time = $request->date;
    $vote->type = 'closed_question';

    $vote->id_permission = $request->permition;
    $vote->subject = $request->category;
    $vote->save();

    return redirect('/');
});

Route::get('/add_page', function () {
    return view('add');
});

Route::post('/', function () {
    return view('welcome');
});

Route::get('/getdatavote/{id}', function ($id) {
    return view('getdatavote', ['vote'=>\App\Vote::find($id)]);
});
