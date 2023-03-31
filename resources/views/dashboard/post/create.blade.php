{{-- Lllamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
{{-- @include('dashboard.partials.session-status') --}}

<form action="{{ route("post.store") }}" method="POST">
    

    @csrf
    {{-- form:post --}}
    {{-- Col 1 --}}
    <div class="row">
        {{-- .row para crear una fila --}}
        <div class="form-group">
            <label for="name">Nombre</label><input class="form-control" type="text" name="name" id="name">
        </div>
    </div>

    {{-- Col 2 --}}
    <div class="row form-group">
        <label for="category_id">Categoria</label>
        <select  name="category" id="category">
            <option value="">Seleccione una categoria</option>
            @foreach ( $category as $category )
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    {{-- Col 3 --}}
    <div class="row form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" rows="10"></textarea>
    </div>

    {{-- Col 4 --}}
    <div class="row center">
        {{-- Las columnas en bootstrap tienen un ancho de 12
            añadir 2 input en una fila: 12/cantidadInput --}}
        <div class="col s6">
            <button class="btn btn-success btn-sm" type="submit">Guardar</button>
            <a href="{{ url('dashboard/post') }}" class="btn btn-secondary bt-sm">Cancelar</a>
        </div>
    </div>
</form>
@endsection