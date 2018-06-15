@extends('layouts.app')
{{--supuesto masterPage--}}

@section('content')
    <div class="container">
        <div class="formContainer">
            <div class="form">
                <form method="POST" action="{{ url('pelicula/store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="nombre" type="text"
                                   class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre"
                                   value="{{ old('nombre') }}" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="año" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                        <div class="col-md-6">
                            <input id="año" type="date"
                                   class="form-control{{ $errors->has('año') ? ' is-invalid' : '' }}" name="año"
                                   value="{{ old('año') }}" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sinopsis" class="col-md-4 col-form-label text-md-right">{{ __('Sinopsis') }}</label>

                        <div class="col-md-6">
                                <textarea id="sinopsis" type="text" class="form-control" name="sinopsis" required
                                          autofocus>{{ old('sinopsis') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>

                        <div class="col-md-6">
                            <input id="director" type="text"
                                   class="form-control{{ $errors->has('director') ? ' is-invalid' : '' }}"
                                   name="director" value="{{ old('director') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="imageurl" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                        <div class="col-md-6">
                            <input id="imageurl" type="file"
                                   class="form-control{{ $errors->has('imageURL') ? ' is-invalid' : '' }}"
                                   name="imageurl" value="{{ old('imageURL') }}" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
