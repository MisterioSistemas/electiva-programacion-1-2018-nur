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
Route::get('/pelicula', 'PeliculaController@index');
Route::get('/pelicula/Listavideos', 'PeliculaController@index2');
Route::get('/pelicula/create', 'PeliculaController@create');
Route::post('/pelicula/store', 'PeliculaController@store');
Route::get('/pelicula/edit/{id}', 'PeliculaController@edit');
Route::get('storage/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/storage/'.$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (Storage::exists($archivo))
    {
        return response()->download($url);
    }
    //si no se encuentra lanzamos un error 404.
    abort(404);

});

Route::post('/pelicula/update/{id}', 'PeliculaController@update');
Route::post('/pelicula/destroy/{id}', 'PeliculaController@destroy');
Route::get('/pelicula', 'PeliculaController@index');
Route::get('/pelicula/mostrapelicula/{id}', 'PeliculaController@mostrapelicula');





