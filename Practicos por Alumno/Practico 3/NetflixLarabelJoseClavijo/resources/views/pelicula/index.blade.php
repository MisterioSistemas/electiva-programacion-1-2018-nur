@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table style="color: red" class="table">
                    <thead>
                    <tr>

                        <th style="color: red">Titulo</th>
                        <th style="color: red">Fecha</th>
                        <th style="color: red">Sinopsis</th>
                        <th style="color: red">Director</th>
                        <th style="color: red">Imagenes</th>
                        <th style="color: red">Editar</th>
                        <th style="color: red">Eliminar</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listaPelicula as $objPelicula)
                        <tr>

                            <td style="color: white">{{$objPelicula["nombre"]}}</td>
                            <td style="color: white">{{$objPelicula["fecha"]}}</td>
                            <td style="color: white">{{$objPelicula["sinopsis"]}}</td>
                            <td style="color: white">{{$objPelicula["direccion"]}}</td>
                            <td style="color: white">{{$objPelicula["imagenes"]}}</td>
                            <td><a class="btn btn-primary"
                                   href="{{action('PeliculaController@edit',$objPelicula['id'])}}">Editar</a></td>
                            <td>
                                <form method="post" action="{{action('PeliculaController@destroy',$objPelicula['id'])}}">
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
