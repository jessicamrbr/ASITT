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

Route::get('/',             function () {return view('welcome');});

Route::get('/resume',       ['uses' => 'RankController@showMyPositionsInRanks']);
Route::get('/timeline',     ['uses' => 'TimelineController@showMyTimeline']);
Route::get('/publications', ['uses' => 'PublicationController@showPublications']);
Route::get('/historics',    ['uses' => 'HistoricController@showHistorics']);
Route::get('/user/edit',    ['uses' => 'UserController@editMyUser']);

Route::post('/user/edit',   ['uses' => 'UserController@doEditMyUser']);

Route::group(['prefix' => 'admin', 'middleware' => 'can:admPrivilege'], function () {
   Route::get('/ranks',                ['uses' => 'RankController@showRanks']);
   Route::get('/rank/new',             ['uses' => 'RankController@newRank']);
   Route::get('/rank/{id}',            ['uses' => 'RankController@showRank']);
   Route::get('/rank/edit/{id}',       ['uses' => 'RankController@editRank']);
   Route::get('/rank/delete/{id}',     ['uses' => 'RankController@deleteRank']);
   Route::get('/position/swap/{id}',   ['uses' => 'RankController@swapPositions']);
   Route::get('/position/finish/{id}', ['uses' => 'RankController@finishPositions']);
   Route::get('/publication/new',      ['uses' => 'PublicationController@newPublications']);
   Route::get('/users',                ['uses' => 'UserController@showUsers']);
   Route::get('/user/edit/{id}',       ['uses' => 'UserController@editUser']);
   Route::get('/user/ranks/{id}',      ['uses' => 'RankController@ranksUser']);
   Route::get('/user/new',             ['uses' => 'UserController@newUser']);

   Route::post('/position/swap',       ['uses' => 'RankController@doSwapPositions']);
   Route::post('/position/finish',     ['uses' => 'RankController@doFinishPositions']);
   Route::post('/rank/new',            ['uses' => 'RankController@doNewRank']);
   Route::post('/rank/delete/',        ['uses' => 'RankController@doDeleteRank']);
   Route::post('/rank/update/',        ['uses' => 'RankController@doUpdateRank']);
   Route::post('/publications/new',    ['uses' => 'PublicationController@doNewPublications']);
   Route::post('/user/edit',           ['uses' => 'UserController@doEditUser']);
   Route::post('/user/ranks/',         ['uses' => 'RankController@doRanksUser']);
   Route::post('/user/new',            ['uses' => 'UserController@doNewUser']);
});

Auth::routes();
