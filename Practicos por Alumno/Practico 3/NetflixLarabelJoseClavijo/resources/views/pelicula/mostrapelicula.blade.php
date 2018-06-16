@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                    <div class="row featurette">
                        <div class="col-sm-5">
                            <img style="width: 300px; height: auto;" class="featurette-image img-responsive center-block" src="{{ asset( $objPelicula["imagenes"])}}" alt="Generic placeholder image 1">
                        </div>
                        <div class="col-sm-5">
                            <h2 style="color: white" class="featurette-heading"><a class="nostyle" name="big-data">  {{ $objPelicula->nombre }}</a></h2>
                            <h3 style="color: white">{{$objPelicula->sinopsis }}</h3>

                            <h3 style="color: white" class="lead">{{$objPelicula->direccion }}</h3>

                            <h3 style="color: white" class="lead">{{$objPelicula->fecha }}</h3>
                        </div>
                    </div>

                    </div>
                </div>
            </div>


@endsection
