<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Replicas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.session-status')
                    <main>
                        <div class="container py-4">
                            <h2> Replicas</h2>
                            @can('crear-reply')
                            <a href="{{ route('reply.create')}}" class="btn btn-primary btn-sm">Crear</a>    
                            @endcan
                           
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>
                                        Id 
                                    </td>
                                    <td>
                                        Post
                                    </td>
                                    <td>
                                        Replica 
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
                             @foreach ($replys as $reply )
                                <tr>
                                    <td>
                                        {{ $reply->id }}
                                    </td>
                                    <td>
                                        {{ $reply->post->name }}
                                    </td>
                                    
                                    <td>
                                        {{ $reply->description }}
                                    </td>
                                    <td>
                                        {{ $reply->created_at->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{ $reply->updated_at->format('d-m-Y') }}
                                    </td>
                                    <td>                                        
                                        @can('editar-reply')
                                        <a href="{{ route('reply.edit',$reply->id)}}" class="btn btn-primary">Actualizar</a>   
                                        @endcan
                                        
                                        <td>
                                        <form  method="post" action="{{ url('dashboard/reply/'.$reply->id) }}"> 
                                            @method('DELETE')
                                            @csrf
                                            @can('borrar-reply')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            @endcan 
                                        </form> 
                                        </td>            
                                    </td> 
                                </tr>
                                @endforeach  
                            </tbody>
                        </table>
                       
                
                        
                    </div>  
                  
                </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    
