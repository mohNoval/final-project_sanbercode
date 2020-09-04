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

use App\Http\Controllers\PertanyaanController;

Route::get('/', 'PertanyaanController@index');

Route::resource('pertanyaan', 'PertanyaanController');
Route::get('pertanyaansya', 'PertanyaanController@my_index');

Route::resource('vote', 'VotePertanyaanController');

Route::resource('downvote', 'DownVoteController');

Route::resource('jawaban', 'JawabanController');

Route::resource('user', 'UserController');

Route::resource('jawaban_tepat', 'JawabanTepatController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/pertanyaan/create', 'PertanyaanController@create');
// Route::post('/pertanyaan', 'PertanyaanController@store');
// Route::get('/pertanyaan', 'PertanyaanController@index');
// Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
// Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
// Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');
// Route::get('/pertanyaan/{id}', 'PertanyaanController@show');
