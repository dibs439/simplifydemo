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

Route::get('/teams', 'TeamsController@index')->name('teams');
Route::get('/team/{id}', 'TeamsController@show')->name('team.show');
Route::get('/matches', 'MatchesController@index')->name('matches');
Route::get('/match/{id}', 'MatchesController@show')->name('match.show');
