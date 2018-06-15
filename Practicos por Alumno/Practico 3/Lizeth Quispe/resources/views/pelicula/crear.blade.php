@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Pelicula') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('pelicula/store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>

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
                                <input id="subtitulo" type="text" class="form-control" name="subtitulo" value="{{ old('subtitulo') }}">

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
                                <textarea id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required ></textarea>

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
                                <input id="logo" type="file" class="custom-file-input" name="logo" value="{{ old('logo') }}" required>
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
                                <input id="portada" type="file" class="custom-file-input" name="portada" value="{{ old('portada') }}" required>
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
                                <input id="poster" type="file" class="custom-file-input" name="poster" value="{{ old('poster') }}" required>
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
                                <input id="duracion" type="time" class="form-control" name="duracion" value="{{ old('duracion') }}" required>

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
                                <input id="emision" type="date" class="form-control" name="emision" value="{{ old('emision') }}" required>

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
                                    <option value="G"> G (todo espectador) </option>
                                    <option value="PG"> PG (menores acompañados de sus padres) </option>
                                    <option value="14A"> 14A (menores de 14 años acompañados por adultos) </option>
                                    <option value="18A"> 18A (menores de 18 años acompañados por adultos) </option>
                                    <option value="R"> R (restringido, ningún menor de 18 años puede ver esta película) </option>
                                    <option value="A"> A (mayores de 18 años) </option>
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
                                    {{ __('Guardar Pelicula') }}
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
