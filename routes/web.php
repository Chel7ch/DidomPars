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

Route::get('/', 'WordController@index');
//Route::get('english/{id}/edit', 'EnglishController@edit');
//Route::get('english/{id}', 'EnglishController@show');
Route::resource('english', 'EnglishController');
Route::resource('russian', 'RussianController');


// Route::get('/', function () {
//      return view('welcome');
// });
