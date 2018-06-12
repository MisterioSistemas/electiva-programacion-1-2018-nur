<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $listaPersonas = Persona::all();
        return view('persona.index', compact('listaPersonas'));
    }

    public function hola()
    {
        return "hola mundo";
    }

    public function create()
    {
        return view('persona.create');
    }

    public function store(Request $request)
    {
        $objPersona = new Persona();
        $objPersona->nombres = $request->get('nombres');
        $objPersona->apellidos = $request->get('apellidos');
        $objPersona->ciudad = $request->get('ciudad');
        $objPersona->edad = $request->get('edad');
        $objPersona->fechaNacimiento = $request->get('fechaNacimiento');
        $objPersona->save();
//        print_r($objPersona);
        return redirect('/persona');
    }

    public function edit($id)
    {
        $objPersona = Persona::find($id);
        return view('persona.edit', compact('objPersona', 'id'));
    }

    public function update(Request $request, $id)
    {
        $objPersona = Persona::find($id);
        $objPersona->nombres = $request->get('nombres');
        $objPersona->apellidos = $request->get('apellidos');
        $objPersona->ciudad = $request->get('ciudad');
        $objPersona->edad = $request->get('edad');
        $objPersona->fechaNacimiento = $request->get('fechaNacimiento');
        $objPersona->save();
//        print_r($objPersona);
        return redirect('/persona');
    }

    public function destroy($id)
    {
        $objPersona = Persona::find($id);
        $objPersona->delete();
        return redirect('/persona');
    }
}
