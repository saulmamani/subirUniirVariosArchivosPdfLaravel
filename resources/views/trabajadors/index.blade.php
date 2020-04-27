@extends('layouts.app')

@section('title', 'Trabajadores')

@section('content')
    <h1>Lista de Trabajadores</h1>
    <hr>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre Completo</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($trabajadors as $trabajador)
            <tr>
                <td>{{ $trabajador->nombre_completo }}</td>
                <td style="width: 250px"><a class="btn btn-primary" href="{{ route('trabajadors.show', [$trabajador->id]) }}"> = Documentos requeridos</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
