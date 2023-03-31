@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
{{-- @include('dashboard.partials.session-status') --}}

<form action="{{ route("category.store") }}" method="POST">
    {{-- @include('dashboard.post._form') --}}
    @csrf
    {{-- form:post --}}
    {{-- Fila 1 --}}
    <div class="row">
        {{-- .row para crear una fila --}}
        <div class="form-group">
            <label for="name">Nombre</label><input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
        </div>
    </div>

    {{-- Fila 2 --}}
    <div class="row form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="10">{{ $category->description }}</textarea>
    </div>

    {{-- Fila3 --}}
    <div class="row center">
        {{-- Las columnas en bootstrap tienen un ancho de 12
            añadir 2 input en una fila: 12/cantidadInput --}}
        <div class="col s6">
            
            <a href="{{ url('dashboard/category') }}" class="btn btn-secondary bt-sm">Volver</a>
        </div>
    </div>
</form>
@endsection