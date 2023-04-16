<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Publicados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <main>    
                        <div class="container py-4">
                            <h2> Post Publicados</h2>
                            @can('crear-Post')
                            <a href="{{ route('post.create')}}" class="btn btn-primary btn-sm">Crear</a>   
                            @endcan
                            
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
                                        @can('editar-Post')
                                            <a href="{{ ('post/'.$post->id.'/edit')}}" method="post" class="btn btn-primary">Editar</a>    
                                        @endcan
                                                                                
                                        <td>                                       
                                                <form  method="post" action="{{ url('dashboard/post/'.$post->id) }}"> 
                                                    @method('DELETE')
                                                    @csrf
                                                    @can('borrar-Post')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    @endcan 
                                                </form>                                         
                                            
                                        </td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

      

 

      

       
    
  

