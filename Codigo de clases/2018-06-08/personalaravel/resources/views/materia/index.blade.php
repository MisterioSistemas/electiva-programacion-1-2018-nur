@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Creditos</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listaMaterias as $objMateria)
                        <tr>
                            <td>{{$objMateria["id"]}}</td>
                            <td>{{$objMateria["nombre"]}}</td>
                            <td>{{$objMateria["creditos"]}}</td>
                            <td>
                                <a class="btn btn-primary"
                                   href="{{ action('MateriaController@edit',$objMateria) }}">Editar</a>
                            </td>
                            <td>
                                <form method="post" action="{{action('MateriaController@destroy',$objMateria)}}">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method"/>
                                    <input type="submit" class="btn btn-danger" value="Eliminar"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
