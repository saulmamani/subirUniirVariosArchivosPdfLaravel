@extends('layouts.app')

@section('title', 'Trabajadores')

@section('content')
    <h2>Cargar documentación requerida</h2>
    {{ $trabajador->nombre_completo }}
    <hr>

    <form action="{{route('trabajadors.update', $trabajador->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" name="file_pdf[]" accept="application/pdf" required multiple>
        <div class="float-right">
            <button class="btn btn-primary">Subir archivos</button>
        </div>

        <hr>

        <iframe src="{{ '/documentos/' . $trabajador->url_documento }}" frameborder="0" width="100%" height="700px"></iframe>

    </form>
@endsection
