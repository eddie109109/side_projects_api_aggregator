<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/h', 'GamesController@index')->name('games.index');

// Route::resource('/h', 'GamesController');

Route::get('/', "App\Http\Controllers\GamesController@index")->name('games.index');
Route::get('/games/{slug}', "App\Http\Controllers\GamesController@show")->name('games.show');

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/show', function () {
//     return view('show');
// });

