<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    public function  index2(){
        $listaPelicula = Pelicula::all();
        return view('pelicula.Listavideos',compact('listaPelicula'));

    }
    public function  index(){
        $listaPelicula = Pelicula::all();
        return view('pelicula.index',compact('listaPelicula'));
    }

    public function  create(){

        return view('pelicula.create');
    }

    public  function store(Request $request){

        //obtenemos el campo file definido en el formulario
        $file = $request->file('imagenes');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local

        Storage::disk('local')->put($nombre,  \File::get($file));


        $objPelicula = new Pelicula();

        $objPelicula->nombre= $request->get('nombre');
        $objPelicula->fecha= $request->get('fecha');
        $objPelicula->sinopsis= $request->get('sinopsis');
        $objPelicula->direccion= $request->get('direccion');
        $objPelicula->imagenes=  'storage/'.$nombre;
        $objPelicula->save();
        return redirect('/pelicula');

    }
    public function edit($id){

        $objPelicula =Pelicula::find($id);

        return view('pelicula.edit',compact('objPelicula','id'));

    }

    public function  update(Request $request ,$id){
        $file = $request->file('imagenes');
        $nombre = $file->getClientOriginalName();
        Storage::disk('local')->put($nombre,  \File::get($file));


        $objPelicula= Pelicula::find($id);

        $objPelicula->nombre= $request->get('nombre');
        $objPelicula->fecha= $request->get('fecha');
        $objPelicula->sinopsis= $request->get('sinopsis');
        $objPelicula->direccion= $request->get('direccion');
        $objPelicula->imagenes=  'storage/'.$nombre;

        $objPelicula->save();


        return redirect('/pelicula');

    }



    public  function destroy($id){
        $objPelicula = Pelicula::find($id);
        $objPelicula->delete();
        return redirect('/pelicula');
    }

    public function mostrapelicula($id){

        $objPelicula =Pelicula::find($id);

        return view('pelicula.mostrapelicula',compact('objPelicula','id'));

    }


}
