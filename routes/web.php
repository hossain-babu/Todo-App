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

Route::get('index', 'TodoController@index');
Route::get('index/{todo}', 'TodoController@show');
Route::get('new-todos', 'TodoController@create');
Route::post('store-todos', 'TodoController@store');

Route::get('Todo/{todo}/edit', 'TodoController@edit');
Route::post('Todo/{todo}/update-todos', 'TodoController@update');

Route::get('Todo/{todo}/delete', 'TodoController@destroy');
Route::get('Todo/{todo}/complete','TodoController@complete');
