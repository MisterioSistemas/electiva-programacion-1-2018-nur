@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Pelicula') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('PeliculaController@update',$id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $objPelicula->titulo }}" required autofocus>

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="subtitulo" class="col-md-4 col-form-label text-md-right">{{ __('Subtitulo') }}</label>

                            <div class="col-md-6">
                                <input id="subtitulo" type="text" class="form-control" name="subtitulo" value="{{ $objPelicula->subtitulo }}">

                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required >{{ $objPelicula->descripcion}}</textarea>

                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <span  class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</span>

                            <div class="col-md-6 custom-file">
                                <input id="logo" type="file" class="custom-file-input" name="logo" value="{{ $objPelicula->logo }}">
                                <label class="custom-file-label" for="portada">Selecciona</label>
                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <span  class="col-md-4 col-form-label text-md-right">{{ __('Portada') }}</span>

                            <div class="col-md-6 custom-file">
                                <input id="portada" type="file" class="custom-file-input" name="portada" value="{{ $objPelicula->portada }}">
                                <label class="custom-file-label" for="portada">Selecciona</label>
                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <span  class="col-md-4 col-form-label text-md-right">{{ __('Poster') }}</span>

                            <div class="col-md-6 custom-file">
                                <input id="poster" type="file" class="custom-file-input" name="poster" value="{{ $objPelicula->poster }}">
                                <label class="custom-file-label" for="poster">Selecciona</label>
                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duracion" class="col-md-4 col-form-label text-md-right">{{ __('Duracion') }}</label>

                            <div class="col-md-6">
                                <input id="duracion" type="time" class="form-control" name="duracion" value="{{ $objPelicula->duracion }}" required>

                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emision" class="col-md-4 col-form-label text-md-right">{{ __('Estreno') }}</label>

                            <div class="col-md-6">
                                <input id="emision" type="date" class="form-control" name="emision" value="{{ $objPelicula->emision }}" required>

                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rango" class="col-md-4 col-form-label text-md-right">{{ __('Clasificación') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="rango" name="rango" value="{{ old('rango') }}">
                                    <option value="G" @if($objPelicula->rango == "G"){{'selected'}}@endif > G (todo espectador) </option>
                                    <option value="PG" @if($objPelicula->rango == "PG"){{'selected'}}@endif > PG (menores acompañados de sus padres) </option>
                                    <option value="14A" @if($objPelicula->rango == "14A"){{'selected'}}@endif > 14A (menores de 14 años acompañados por adultos) </option>
                                    <option value="18A" @if($objPelicula->rango == "18A"){{'selected'}}@endif > 18A (menores de 18 años acompañados por adultos) </option>
                                    <option value="R" @if($objPelicula->rango == "R"){{'selected'}}@endif > R (restringido, ningún menor de 18 años puede ver esta película) </option>
                                    <option value="A" @if($objPelicula->rango == "A"){{'selected'}}@endif > A (mayores de 18 años) </option>
                                </select>

                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" formenctype="multipart/form-data">
                                    {{ __('Actualizar Pelicula') }}
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
