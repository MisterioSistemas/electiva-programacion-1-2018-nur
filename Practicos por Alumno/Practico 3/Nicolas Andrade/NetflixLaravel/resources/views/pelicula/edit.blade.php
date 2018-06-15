@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Pelicula') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('PeliculaController@update', $id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nombre"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre"
                                           value="{{ $objPelicula->nombre }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="40"
                                              rows="10">{{$objPelicula->descripcion}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duracion"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Duracion') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="duracion" type="text"
                                           class="form-control"
                                           value="{{$objPelicula->duracion}}"
                                           name="duracion" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagen"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="imagen" type="file"
                                           class="form-control"
                                           value="{{$objPelicula->imagen}}"
                                           name="imagen" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
