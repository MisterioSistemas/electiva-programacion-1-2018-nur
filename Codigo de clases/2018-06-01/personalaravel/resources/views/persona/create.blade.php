@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Insertar Persona') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('persona/store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" required autofocus>
                                {{--TODO: Validacion de errores--}}
                                {{-- dentro del class: {{ $errors->has('nombres') ? ' is-invalid' : '' }}--}}
                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required autofocus>
                                {{--TODO: Validacion de errores--}}
                                {{-- dentro del class: {{ $errors->has('apellidos') ? ' is-invalid' : '' }}--}}
                                {{--@if ($errors->has('name'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('apellidos') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-6">
                                <input id="edad" type="text" class="form-control" name="edad" value="{{ old('edad') }}" required autofocus>
                                {{--TODO: Validacion de errores--}}
                                {{-- dentro del class: {{ $errors->has('edad') ? ' is-invalid' : '' }}--}}
                                {{--@if ($errors->has('edad'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('edad') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" required autofocus>
                                {{--TODO: Validacion de errores--}}
                                {{-- dentro del class: {{ $errors->has('ciudad') ? ' is-invalid' : '' }}--}}
                                {{--@if ($errors->has('ciudad'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('ciudad') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fechaNacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fechaNacimiento" type="date" class="form-control" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required autofocus>
                                {{--TODO: Validacion de errores--}}
                                {{-- dentro del class: {{ $errors->has('ciudad') ? ' is-invalid' : '' }}--}}
                                {{--@if ($errors->has('ciudad'))--}}
                                {{--<span class="invalid-feedback">--}}
                                {{--<strong>{{ $errors->first('ciudad') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar persona') }}
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
