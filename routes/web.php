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

Route::resource('players', 'PlayersController');
//Route::resource('teams', 'TeamsController');
Route::resource('/teams', 'TeamsController');
Route::resource('matches', 'MatchesController');
Route::resource('PlayerScorecard', 'PlayerScorecardController');

//Route::get('/teams', 'TeamsController@index')->name('teams');
//Route::get('/team/{id}', 'TeamsController@show')->name('team.show');
Route::get('/matches', 'MatchesController@index')->name('matches');
Route::get('/match/{id}', 'MatchesController@show')->name('match.show');
Route::get('/match/score/{id}', 'MatchesController@scores')->name('matches.score');
Route::post('/match/score/{id}', 'MatchesController@updateScores')->name('matches.score');
