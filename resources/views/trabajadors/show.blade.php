@extends('layouts.app')

@section('title', 'Trabajadores')

@section('content')
    <h2>Cargar documentación requerida</h2>
    {{ $trabajador->nombre_completo }}
    <hr>


@endsection
