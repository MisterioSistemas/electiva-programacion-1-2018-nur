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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pelicula/create','PeliculaController@create');
Route::post('/pelicula/store','PeliculaController@store');
Route::get('/pelicula', 'PeliculaController@index');
Route::get('/pelicula/edit/{id}','PeliculaController@edit');
Route::post('/pelicula/update/{id}', 'PeliculaController@update');
Route::post('/pelicula/destroy/{id}', 'PeliculaController@destroy');