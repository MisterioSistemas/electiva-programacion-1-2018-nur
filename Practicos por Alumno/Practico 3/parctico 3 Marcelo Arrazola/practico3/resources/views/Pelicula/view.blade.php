@extends('layouts.app')
{{--supuesto masterPage--}}

@section('content')
    <div class="container">
        <div>
            <div class="divAtras">
                <a href="{{ url('pelicula/') }}" class="link linkDesc"><i class="far fa-arrow-alt-circle-left"><-</i>Atras</a>
            </div>
            <div class="divImagen">
                <img src="/css/img/{{$objPelicula->nombre}}.jpg" alt="portada1" class="imgPortadaDesc"/>
            </div>
            <div class="contenido">
                <div class="divNombre">
                    <label class="tituloDesc">Pelicula: <br>
                        {{$objPelicula->nombre}}
                    </label>
                </div>
                <div class="divSinopsis">
                    <label class="textoDesc"> Sinopsis:<br>
                        {{$objPelicula->sinopsis}}
                    </label>
                </div>

                <div class="divAnho">
                    <label class="textoDesc"> Fecha de Estreno: <br>
                        {{$objPelicula->año}}
                    </label>
                </div>

                <div class="divDirector">
                    <label class="textoDesc"> Director: <br>
                        {{$objPelicula->director}}
                    </label>
                </div>

            </div>
            <a href="{{action('PeliculaController@view',$objPelicula['id'])}}" class="linkIconDesc iconPlayDesc">
                <i class="far fa-play-circle"></i>
            </a>
            <div class="divSubIconsDesc">
                <a href="#" class="linkIconDesc subIconsDesc">
                    <i class="far fa-thumbs-up"></i>
                </a>
                <a href="#" class="linkIconDesc subIconsDesc">
                    <i class="far fa-thumbs-down"></i>
                </a>
                <a href="#" class="linkIconDesc subIconsDesc">
                    <i class="far fa-plus-square"></i>
                </a>
            </div>
        </div>

    </div>
@endsection
