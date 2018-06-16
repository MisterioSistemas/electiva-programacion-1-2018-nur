<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index(){
        $listaPeliculas = Pelicula::all();
        return view('pelicula.index',compact('listaPeliculas'));
    }
    public function pagina(){
        $listaPeliculas = Pelicula::all();
        return view('pelicula.paginaprincipal',compact('listaPeliculas'));
    }
    public function create()
    {
        return view('pelicula.create');
    }
    public function store(Request $request){
        $objPelicula = new Pelicula();
        $objPelicula->titulo=$request->get('titulo');
        $objPelicula->descripcion=$request->get('descripcion');
        $objPelicula->duraccion=$request->get('duraccion');
        $objPelicula->imagen=$request->get('imagen');
        //print_r($objPelicula);
       $objPelicula->save();
        return redirect('/pelicula/index');
    }
    public function edit($id){
        $objPelicula = Pelicula::find($id);
        return view('pelicula.edit',compact('objPelicula','id'));
    }

    public function show($id){
        $objPelicula = Pelicula::find($id);
        return view('pelicula.detalle',compact('objPelicula','id'));
    }

    public function update(Request $request,$id){
        $objPelicula = Pelicula::find($id);
        $objPelicula->titulo=$request->get('titulo');
        $objPelicula->descripcion=$request->get('descripcion');
        $objPelicula->duraccion=$request->get('duraccion');
        $objPelicula->imagen=$request->get('imagen');
        $objPelicula->save();
        return redirect('/pelicula/index');

    }
    public function destroy($id){
        $objPelicula = Pelicula::find($id);
        $objPelicula->delete();
        return redirect('/pelicula/index');
    }
}
