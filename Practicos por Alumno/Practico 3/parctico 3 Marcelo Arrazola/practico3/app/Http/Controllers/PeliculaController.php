<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index(){
        $listaPelicula = Pelicula::all();

        return view('pelicula.index', compact('listaPelicula'));
    }

    public function create(){
        return view('pelicula.create');
    }

    public function origin(){
        $listaPelicula = Pelicula::all();

        return view('pelicula.origin', compact('listaPelicula'));
    }

    public function view($id){
        $objPelicula = Pelicula::find($id);
        return view('pelicula.view', compact('objPelicula'));
    }

    public function store(Request $request)
    {
        $objPelicula = new Pelicula();
        $objPelicula->nombre = $request->get('nombre');
        $objPelicula->año = $request->get('año');
        $objPelicula->sinopsis = $request->get('sinopsis');
        $objPelicula->director = $request->get('director');
        $objPelicula->imageURL = $request->get('nombre').".jpg";
        $ruta = "css/img/";
        $request->file('imageurl')->move($ruta, $request->get('nombre').".jpg");

        $objPelicula->save();
        return redirect('/pelicula/index');
    }

    public function edit($id)
    {
        $objPelicula = Pelicula::find($id);
        return view('pelicula.edit',compact('objPelicula','id'));
    }

    public function update(Request $request, $id)
    {
        $objPelicula = Pelicula::find($id);
        $objPelicula->nombre = $request->get('nombre');
        $objPelicula->año = $request->get('año');
        $objPelicula->sinopsis = $request->get('sinopsis');
        $objPelicula->director = $request->get('director');
        $objPelicula->imageURL = $request->get('imageurl');
        $objPelicula->save();
        return redirect('/pelicula/index');
    }
    public function destroy($id)
    {
        $objPelicula = Pelicula::find($id);
        $objPelicula->delete();

        return redirect('/pelicula/index');
    }
}
