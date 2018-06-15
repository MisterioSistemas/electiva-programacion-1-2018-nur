@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="titulo">{{$objPelicula->nombre}}</h1>
                <img src="/css/img/{{$objPelicula->imagen}}" alt="imagen" style="height: 50%; width: 50%;">
                <h3>{{$objPelicula->descripcion}}</h3>
                <h4>{{$objPelicula->duracion}} minutos</h4>
                <a class="btn btn-link" href="{{action('PeliculaController@index')}}">Volver a la Lista</a>
            </div>
        </div>
    </div>
@endsection
