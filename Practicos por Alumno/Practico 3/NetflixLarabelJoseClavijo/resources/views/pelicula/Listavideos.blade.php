@extends('layouts.app')

@section('content')



        <div class="row">
                @foreach($listaPelicula as $objPelicula)

                <div class="col-md-3 col-md-2">


                    <div class="container">

                        <a  href="{{action('PeliculaController@mostrapelicula',$objPelicula['id'])}}">
                            <img src="{{ asset( $objPelicula["imagenes"])}}"  class="image" >
                        </a>


                    <div class="overlay">

                                Titulo
                                <p>{{$objPelicula["nombre"]}}</p>
                                Fecha
                                <p>{{$objPelicula["fecha"]}}</p>
                                sinopsis
                                <p>{{$objPelicula["sinopsis"]}}</p>
                                Director
                                <p>{{$objPelicula["direccion"]}}</p>
                            </div>
                    </div>

                </div>
                @endforeach


        </div>











@endsection
