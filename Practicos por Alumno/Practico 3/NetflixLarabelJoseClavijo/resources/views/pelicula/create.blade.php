@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('pelicula/store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="TITULO" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="FECHA" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ old('fecha') }}" required>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="SINOPSIS" class="col-md-4 col-form-label text-md-right">{{ __('Sinopsis') }}</label>

                            <div class="col-md-6">
                                <input id="sinopsis" type="text" class="form-control{{ $errors->has('sinopsis') ? ' is-invalid' : '' }}" name="sinopsis" required>

                                @if ($errors->has('sinopsis'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sinopsis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DIRECTOR" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IMAGENES" class="col-md-4 col-form-label text-md-right">{{ __('Imagenes') }}</label>

                            <div class="col-md-6">
                                <input  id="imagenes" type="file" class="form-control" name="imagenes" required>


                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Pelicula') }}
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
