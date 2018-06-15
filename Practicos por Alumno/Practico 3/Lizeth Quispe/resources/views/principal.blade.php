@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navegador">
        <a class="navbar-brand" href="#">
            <img id="LogoNetflix" src="{{asset('imagenes/Netflixlogo.png')}}" alt="Logo Netflix"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Peliculas</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-md-0">
                <i class="iconSimple" data-feather="search" ></i>
                <a id="link" class="nav-link" href="#" >KIDS</a>
                <i class="iconComplete" data-feather="bell" ></i>

                <img id="profile" src="{{asset('imagenes/Daria.jpg')}}" alt="profile" />
                <i id="triangulo" data-feather="triangle"></i>
            </div>
        </div>
    </nav>

    <div class="container-fluid" id="ContainerPortada">
        <div id="MascaraPortada" style=""></div>
        <img id="ImagenPortada" src="{{asset('imagenes/1portada.jpeg')}}" alt="imagen1" class="container-fluid"/>
    </div>
    <div id="containerInformacion" >
        <div class="center">
            <img class="ImageLogo" src="{{asset('imagenes/1logo.png')}}" alt="Logo de serie"/>
            <div class="form-inline">
                <form>
                    <div class="btnContainer" >
                        <i class="iconComplete" data-feather="play"></i>
                        <input class="btnInfo" type="submit" value="Reproducir" />
                    </div>
                </form>
                <form>
                    <div class="btnContainer">
                        <i class="iconComplete" data-feather="edit-2" ></i>
                        <input class="btnInfo" type="submit" value="Agregar" />
                    </div>
                </form>
            </div>
        </div>

        <div id="informacion" class="container-fluid">
            <h4>
                Mira sus 5 temporadas.
            </h4>
            <p>
                ¿Listos para la aventura?
                Acompaña a Lina, Gourry y sus amigos en aventuras magicas y llena de villanos misteriosos.
            </p>
        </div>
    </div>


    <section class="slider" style="margin-top: -50px; background-color: #1B1A1B;">
        <div class="flexslider carousel" style="padding-top:30px; margin-bottom:0px;background-color: #1B1A1B;">
            <ul class="slides" style="background-color: #1B1A1B; border-color: #1B1A1B;">
             @foreach($listaPelicula as $objPelicula)
                <li>
                    <div style="width: 210px; height: 320px;">
                    <a style="background-color: transparent;" class="texto" data-toggle="collapse" href="#collapseExample{{$objPelicula["id"]}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <img style="width: 210px; height: 320px;" id="contenidoImg{{$objPelicula["id"]}}" src="{{ asset('imagenes/'.$objPelicula["poster"]) }}" alt="Carousel{{$objPelicula["id"]}}"/>
                    </a>
                    </div>
                </li>

            @endforeach
            </ul>

        </div>
    </section>


    @foreach($listaPelicula as $objPelicula)
        <div class="container-fluid collapse" id="collapseExample{{$objPelicula["id"]}}">
            <div class="card card-body" style="margin-right: 15px;">
                <img style="padding-left: 150px; height: 500px;" src="{{ asset('imagenes/'.$objPelicula["portada"])}}">
                <div id="MascaraInfo" style=""></div>
            </div>
            <div class="containerMas" >
                <div class="center">
                    <img class="ImageLogo" src="{{ asset('imagenes/'.$objPelicula["logo"])}}" alt="Logo de serie"/>
                    <div class="form-inline">
                        <a style="color: white;" href="{{action('PeliculaController@edit',$objPelicula['id'])}}" class="btnContainer" >
                            <i class="iconComplete" data-feather="edit-2"></i>
                            Editar
                        </a>
                        <form method="post" action="{{action('PeliculaController@destroy',$objPelicula['id'])}}">
                            <div class="btnContainer">
                                <i class="iconComplete" data-feather="trash-2" ></i>
                                @csrf
                                <input class="btnInfo" type="submit" value="Borrar" />
                            </div>
                        </form>
                    </div>
                </div>

                <div id="informacion" class="container-fluid">
                    <h4>
                        Estrenada: {{ $objPelicula["emision"]}}
                    </h4>
                    <p style="width:350px;">
                        {{ $objPelicula["descripcion"]}}
                    </p>
                    <span style="padding: 5px 5px;  background-color: #27282B; width: auto; color: white; font-weight: bolder; font-size: 20px;">
                        {{ trim($objPelicula["rango"])}}
                    </span>
                    <span style="padding: 3px 6px; margin-left: 15px; background-color: #27282B; width: auto; color: white; font-weight: bolder; font-size: 10px;">

                        {{ $objPelicula["duracion"]}}
                    </span>
                </div>
            </div>
        </div>
    @endforeach


    {{--<section class="carousel slide" data-ride="carousel" id="postsCarousel">--}}
        {{--<div class="container">--}}
            {{--<div class="row" id="flechas">--}}
                {{--<a id="btnprev" class="btn btn-outline-secondary prev" style="border: none"href=""><i data-feather="chevron-left" style="color: white;border: none;"></i></a>--}}
                {{--<a id="btnmore" class="btn btn-outline-secondary next" style="border: none" href=""><i data-feather="chevron-right" style="color: white;border: none;"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}


    {{--</section>--}}


@endsection
