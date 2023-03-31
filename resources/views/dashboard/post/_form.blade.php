@extends('dashboard.master')
@section('contenido')
@include('dashboard.partials.validation-error')


<form action="{{ route("post.store") }}" method="POST">
   <main>
    @csrf
<div class="row">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$post->name) }}">
    </div>
    
    <div class="form-group">
        <label for="description">Descripción</label>
        <input class="form-control" type="text" name="description" id="description" value="{{ old('description',$post->description) }}">
    </div>

    {{--<div class="form-group">
        <label for="content">Contenido</label>
        <textarea class="form-control"  id="content" name="content" rows="3"> {{ old('content',$post->content) }}></textarea>
    </div>  --}}
    <div class="row center">
        {{-- Las columnas en bootstrap tienen un ancho de 12
            añadir 2 input en una fila: 12/cantidadInput --}}
        <div class="col s6">
            <button class="btn btn-success btn-sm" type="submit">Guardar</button>
            <a href="{{ url('dashboard/post') }}" class="btn btn-secondary bt-sm">Cancelar</a>
        </div>
    </div>
</div>
   </main>
</form>
@endsection