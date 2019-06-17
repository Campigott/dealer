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
      return redirect()->action(
        'UsersController@index'
    );
});

Route::group(['prefix' => 'users'], function () {
    Route::any('/pesquisa', 'UsersController@pesquisa');
    Route::any('/pesquisa-topacess', 'UsersController@pesquisa');
    Route::any('/pesquisa-lessacess', 'UsersController@pesquisa');
    Route::get('/', 'UsersController@index');
});

