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

//Pages
Route::get('/','PagesController@home');
Route::get('/home','PagesController@home');
Route::get('/a{slug}', 'PagesController@show');

//Matches
Route::get('/matchcreate', 'MatchesController@create');
Route::post('/matchcreate', 'MatchesController@store');
Route::get('/match', 'MatchesController@match');
Route::get('/filter', 'MatchesController@filter');
Route::get('/m{slug}', 'MatchesController@show');
Route::get('/editmatch{slug}', 'MatchesController@edit');
Route::post('/editmatch{slug}', 'MatchesController@update');
Route::post('/deletematch{slug}', 'MatchesController@delete');

//Teams
Route::get('/teamcreate', 'TeamsController@create');
Route::post('/teamcreate', 'TeamsController@store');
Route::get('/team', 'TeamsController@team');
Route::get('/t{slug}', 'TeamsController@show');
Route::get('/editteam{slug}', 'TeamsController@edit');
Route::post('/editteam{slug}', 'TeamsController@update');
Route::post('/deleteteam{slug}', 'TeamsController@delete');

//Players
Route::get('/playercreate', 'PlayersController@create');
Route::post('/playercreate', 'PlayersController@store');
Route::get('/player', 'PlayersController@player');
Route::get('/p{slug}', 'PlayersController@show');
Route::get('/editplayer{slug}', 'PlayersController@edit');
Route::post('/editplayer{slug}', 'PlayersController@update');
Route::post('/deleteplayer{slug}', 'PlayersController@delete');

//Stadiums
Route::get('/stadiumcreate', 'StadiumsController@create');
Route::post('/stadiumcreate', 'StadiumsController@store');
Route::get('/stadium', 'StadiumsController@stadium');
Route::get('/s{slug}', 'StadiumsController@show');
Route::get('/editstadium{slug}', 'StadiumsController@edit');
Route::post('/editstadium{slug}', 'StadiumsController@update');
Route::post('/deletestadium{slug}', 'StadiumsController@delete');

