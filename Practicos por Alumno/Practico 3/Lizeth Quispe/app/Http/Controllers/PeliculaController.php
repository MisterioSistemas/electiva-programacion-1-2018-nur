<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use Storage;

class PeliculaController extends Controller
{
    public function create(){
        return view('pelicula.crear');
    }

    public function index(){
        $listaPelicula = Pelicula::all();
        return view('principal',compact('listaPelicula'));
    }

    public function edit($id)
    {
        $objPelicula = Pelicula::find($id);
        return view('pelicula.edit', compact('objPelicula', 'id'));
    }

    public function update(Request $request, $id){

        $objPelicula = Pelicula::find($id);


        if($request->file("logo") != null){
            $logo = $request->file("logo");
            $extension_logo = \File::mimeType($logo);
            $extension1_logo1 = explode("/",$extension_logo);
            $route_logo = $id.time()."logo.".$extension1_logo1[1];
            Storage::disk('imagenes')->delete($objPelicula['logo']);
            Storage::disk('imagenes')->put($route_logo, file_get_contents($logo->getRealPath()));
            $objPelicula->logo = $route_logo;
        }

        if($request->file("portada") != null){
            $portada = $request->file('portada');
            $extension_portada = \File::mimeType($portada);
            $extension_portada1 = explode("/",$extension_portada);
            $route_portada = $id.time()."portada.".$extension_portada1[1];
            Storage::disk('imagenes')->delete($objPelicula['portada']);
            Storage::disk('imagenes')->put($route_portada, file_get_contents($portada->getRealPath()));
            $objPelicula->portada = $route_portada;
        }

        if($request->file("poster") != null){
            $poster = $request->file('poster');
            $extension_poster = \File::mimeType($poster);
            $extension_poster1 = explode("/",$extension_poster);
            $route_poster = $id.time()."poster.".$extension_poster1[1];
            Storage::disk('imagenes')->delete($objPelicula['poster']);
            Storage::disk('imagenes')->put($route_poster, file_get_contents($poster->getRealPath()));
            $objPelicula->poster = $route_poster;
        }

        $objPelicula->titulo = $request->get('titulo');
        $objPelicula->subtitulo = $request->get('subtitulo');
        $objPelicula->descripcion = $request->get('descripcion');
        $objPelicula->duracion = $request->get('duracion');
        $objPelicula->emision = $request->get('emision');
        $objPelicula->rango = $request->get('rango');
        $objPelicula->save();
//        print_r($objPelicula);
        return redirect('/pelicula');
    }

    public function destroy($id){
        $objPelicula = Pelicula::find($id);
        Storage::disk('imagenes')->delete($objPelicula['logo']);
        Storage::disk('imagenes')->delete($objPelicula['poster']);
        Storage::disk('imagenes')->delete($objPelicula['portada']);
        $objPelicula->delete();
        return redirect('/pelicula');
    }

    public function store(Request $request){
        $objPelicula = new Pelicula();
        $objPelicula->titulo = $request->get('titulo');
        $objPelicula->subtitulo = ($request->get('subtitulo') == null )? '': $request->get('subtitulo');
        $objPelicula->descripcion = $request->get('descripcion');
        $objPelicula->logo = 'logo';
        $objPelicula->portada = 'portada';
        $objPelicula->poster = 'poster';
        $objPelicula->duracion = $request->get('duracion');
        $objPelicula->emision = $request->get('emision');
        $objPelicula->rango = $request->get('rango');
        $objPelicula->save();

        $ultimoid = $objPelicula->id;

        $logo = $request->file("logo");
        $extension_logo = \File::mimeType($logo);
        $extension1_logo1 = explode("/",$extension_logo);
        $route_logo = $ultimoid."logo.".$extension1_logo1[1];

        Storage::disk('imagenes')->put($route_logo, file_get_contents($logo->getRealPath()));

        $portada = $request->file('portada');
        $extension_portada = \File::mimeType($portada);
        $extension_portada1 = explode("/",$extension_portada);
        $route_portada = $ultimoid."portada.".$extension_portada1[1];

        Storage::disk('imagenes')->put($route_portada, file_get_contents($portada->getRealPath()));

        $poster = $request->file('poster');
        $extension_poster = \File::mimeType($poster);
        $extension_poster1 = explode("/",$extension_poster);
        $route_poster = $ultimoid."poster.".$extension_poster1[1];

        Storage::disk('imagenes')->put($route_poster, file_get_contents($poster->getRealPath()));

        $objPelicula1 = Pelicula::find($ultimoid);
        $objPelicula1->titulo = $request->get('titulo');
        $objPelicula1->subtitulo = $request->get('subtitulo');
        $objPelicula1->descripcion = $request->get('descripcion');
        $objPelicula1->logo = $route_logo;
        $objPelicula1->portada = $route_portada;
        $objPelicula1->poster = $route_poster;
        $objPelicula1->duracion = $request->get('duracion');
        $objPelicula1->emision = $request->get('emision');
        $objPelicula1->rango = $request->get('rango');
        $objPelicula1->save();

        return redirect('/pelicula');
    }
}
