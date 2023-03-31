@extends('dashboard.master')
@section('contenido')

@include('dashboard.partials.validation-error')
{{-- @include('dashboard.partials.session-status') --}}

<form action="{{ route('post.store') }}" method="post">
    @csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input readonly class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
</div>
 
<div class="form-group">
    <label for="description">Descripción</label>
    <input readonly class="form-control" type="text" name="description" id="description" value="{{ $post->description }}">
</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea readonly class="form-control"  id="content" name="content" rows="3"> {{ $post->content }}</textarea>
</div>

<div class="row center">
    {{-- Las columnas en bootstrap tienen un ancho de 12
        añadir 2 input en una fila: 12/cantidadInput --}}
    <div class="col s6">
        
        <a href="{{ url('dashboard/post') }}" class="btn btn-secondary bt-sm">Volver</a>
    </div>
</div>
</form>  
@endsection