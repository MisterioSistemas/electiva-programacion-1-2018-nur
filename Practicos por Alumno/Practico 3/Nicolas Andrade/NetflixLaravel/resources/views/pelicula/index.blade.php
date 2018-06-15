@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <table class="table">
                    <thead>
                    <tr>
                        <td>id</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Duriacion</td>
                        <td>Imagen</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listaPeliculas as $objPelicula)
                        <tr>
                            <td>{{$objPelicula["id"]}}</td>
                            <td>{{$objPelicula["nombre"]}}</td>
                            <td>{{$objPelicula["descripcion"]}}</td>
                            <td>{{$objPelicula["duracion"]}}</td>
                            <td>{{$objPelicula["imagen"]}}</td>
                            <td>
                                <a class="btn btn-info" href="{{action('PeliculaController@show', $objPelicula['id'])}}">Ver Detalle</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{action('PeliculaController@edit', $objPelicula['id'])}}">Editar</a>
                            </td>
                            <td>
                                <form method="post" action="{{action('PeliculaController@destroy', $objPelicula['id'])}}">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Eliminar">
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
