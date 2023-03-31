@extends('dashboard.master')
@section('contenido')
@include('dashboard.partials.validation-error')



   <main>
    @csrf
<div class="row">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$category->name) }}">
    </div>
    
    <div class="form-group">
        <label for="description">Descripción</label>
        <input class="form-control" type="text" name="description" id="description" value="{{ old('description',$category->description) }}">
    </div>

    
    <div class="row center">
        {{-- Las columnas en bootstrap tienen un ancho de 12
            añadir 2 input en una fila: 12/cantidadInput --}}
        <div class="col s6">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{ url('dashboard/category') }}" class="btn btn-secondary bt-sm">Cancelar</a>
        </div>
    </div>
</div>
   </main>

@endsection