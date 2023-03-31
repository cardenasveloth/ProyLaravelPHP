<!DOCTYPE html>
<html lang="en">
@extends('dashboard.master')
{{-- @section('titulo','Poster') --}}
@section('contenido')
    <main>
        <div class="container py-4">
            <h2> Categorias</h2>
           <a href="{{ route('category.create')}}" class="btn btn-primary btn-sm">Crear</a>
        <table class="table">
            <thead>
                <tr>
                    <td>
                        Id 
                    </td>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Descripción 
                    </td>                    
                    <td> 
                        Fecha creación 
                    </td>
                    <td> 
                        Fecha actualización 
                    </td>
                    <td>
                        Acciones
                    </td>
                </tr>
            </thead>
          <tbody> 
             @foreach ($categorys as $category )
                <tr>
                    <td>
                        {{ $category->id }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->description }}
                    </td>
                    <td>
                        {{ $category->created_at->format('d-m-Y') }}
                    </td>
                    <td>
                        {{ $category->updated_at->format('d-m-Y') }}
                    </td>
                    <td>
                        <a href="{{ route('category.show',$category->id)}}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary">Actualizar</a>
                        <button data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $category->id }}"
                        class="btn btn-outline-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach  
            </tbody>
        </table>
        {{ $categorys->links() }} 

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea borrar el registro seleccionado?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <form id="formDelete" method="POST" action="{{ url('dashboard/category/'.$category->id) }}" >
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  

       
    </main>
@endsection   
</html>