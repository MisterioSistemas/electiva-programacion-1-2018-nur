<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPeliculas = Pelicula::all();
        return view('pelicula.index', compact("listaPeliculas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objPelicula = new Pelicula();
        $objPelicula->nombre = $request->get("nombre");
        $objPelicula->descripcion = $request->get("descripcion");
        $objPelicula->duracion = $request->get("duracion");
        $objPelicula->imagen = $request->file("imagen")->getClientOriginalName();
        $ruta = "css/img/";
        $request->file('imagen')->move($ruta, $request->file('imagen')->getClientOriginalName());
        $objPelicula->save();
        return redirect("/pelicula");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objPelicula = Pelicula::find($id);
        return view('pelicula.verDetalle', compact('objPelicula', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objPelicula = Pelicula::find($id);
        return view('pelicula.edit', compact('objPelicula', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $peliculaId)
    {
        $objPelicula = Pelicula::find($peliculaId);
        $objPelicula->nombre = $request->get("nombre");
        $objPelicula->descripcion = $request->get("descripcion");
        $objPelicula->duracion = $request->get("duracion");
        $objPelicula->imagen = $request->get("imagen");
        $objPelicula->save();
        return redirect("/pelicula");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objPelicula = Pelicula::find($id);
        $objPelicula->delete();
        return redirect('/pelicula');
    }
}
