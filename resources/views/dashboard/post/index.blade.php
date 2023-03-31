@extends('dashboard.master')
@section('titulo','Poster')
@section('contenido')
    
        <div class="container py-4">
            <h2> Post Publicados</h2>
            <a href="{{ route('post.create')}}" class="btn btn-primary btn-sm">Crear</a>
        <table class="table" >
            <thead>
                <tr>
                    <td>
                        Id 
                    </td>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Categoria 
                    </td>
                    
                    <td>
                        Descripción 
                    </td>

                    <td>
                        Estado 
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
                @foreach ($posts as $post )
                <tr>
                    <td>
                        {{ $post->id }}
                    </td>
                    <td>
                        {{ $post->name }}
                    </td>
                    <td>
                        {{ $post->category->name }}
                    </td>
                   
                    <td>
                        {{ $post->description }}
                    </td>

                    <td>
                        {{ $post->state }}
                    </td>

                    
                    <td>
                        {{ $post->created_at->format('d-m-Y') }}
                    </td>
                    <td>
                        {{ $post->updated_at->format('d-m-Y') }}
                    </td>
                    <td>
                        <a href="{{ route('post.show',$post->id)}}" class="btn btn-primary">  "Ver"    </a>
                        <a href="{{ ('post/'.$post->id.'/edit')}}" method="post" class="btn btn-primary">Actualizar</a>
                    <td>    
                        <form  method="post" action="{{ url('dashboard/post/'.$post->id) }}"> 
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      

@endsection 

      

       
    
  

