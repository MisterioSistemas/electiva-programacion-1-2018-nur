@extends('layouts.app')
{{--supuesto masterPage--}}

@section('content')
    <div class="container">
        <div>
            <div class="contenedorPeliculas">
                @foreach($listaPelicula as $objPelicula)
                    <a href="{{action('PeliculaController@view',$objPelicula['id'])}}">
                        <div class="pelicula">
                            <label class="id" id="id">{{$objPelicula->id}}</label>

                            <div class="divPortada">
                                <img class="imgPortada" src="css/img/{{$objPelicula->imageURL}}" alt="portada1"/>
                            </div>
                            <div class="divTexto">
                                <h1 class="titulo">
                                    {{$objPelicula->nombre}}
                                </h1>
                                <label class="texto">
                                    {{$objPelicula->sinopsis}}<a href="{{ url('pelicula/') }}" class="link">ver mas</a>
                                </label>
                            </div>

                        </div>
                    </a>

                @endforeach
            </div>
        </div>
    </div>
@endsection
