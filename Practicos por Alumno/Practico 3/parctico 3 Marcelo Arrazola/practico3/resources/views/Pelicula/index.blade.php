@extends('layouts.app')
{{--supuesto masterPage--}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Director</th>
                        <th>ImageURL</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listaPelicula as $objPelicula)
                        <tr>
                            <th>{{$objPelicula["id"]}}</th>
                            <th>{{$objPelicula["nombre"]}}</th>
                            <th>{{$objPelicula["año"]}}</th>
                            <th>{{$objPelicula["sinopsis"]}}</th>
                            <th>{{$objPelicula["director"]}}</th>
                            <th>
                                <a class="btn btn-primary" href="{{action('PeliculaController@edit',$objPelicula['id'])}}">Editar</a>
                            </th>
                            <th>
                                <form method="post" action="{{action('PeliculaController@destroy', $objPelicula['id'])}}">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Eliminar">
                                </form>
                            </th>
                        </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
