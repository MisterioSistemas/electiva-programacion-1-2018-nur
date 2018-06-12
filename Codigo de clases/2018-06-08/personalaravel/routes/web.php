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


Route::get('/persona/create', 'PersonaController@create');
Route::post('/persona/store', 'PersonaController@store');
Route::get('/persona/edit/{id}', 'PersonaController@edit');
Route::post('/persona/update/{id}', 'PersonaController@update');
Route::post('/persona/destroy/{id}', 'PersonaController@destroy');
Route::get('/persona', 'PersonaController@index');
Route::get('/persona/hola', 'PersonaController@hola');
Route::resource('materia', 'MateriaController');