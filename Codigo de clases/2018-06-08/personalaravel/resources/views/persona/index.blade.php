@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Ciudad</th>
                        <th>Fecha de Nacimiento</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listaPersonas as $objPersona)
                        <tr>
                            <td>{{$objPersona["id"]}}</td>
                            <td>{{$objPersona["nombres"]}}</td>
                            <td>{{$objPersona["apellidos"]}}</td>
                            <td>{{$objPersona["edad"]}}</td>
                            <td>{{$objPersona["ciudad"]}}</td>
                            <td>{{$objPersona["fechaNacimiento"]}}</td>
                            <td>
                                <a class="btn btn-primary"
                                   href="{{ action('PersonaController@edit',$objPersona['id']) }}">Editar</a>
                            </td>
                            <td>
                                <form method="post" action="{{action('PersonaController@destroy',$objPersona['id'])}}">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Eliminar"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
