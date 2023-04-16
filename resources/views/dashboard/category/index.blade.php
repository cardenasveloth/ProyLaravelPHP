<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <main>
                        <div class="container py-4">
                            <h2> Categorias</h2>
                            @can('crear-category')
                            <a href="{{ route('category.create')}}" class="btn btn-primary btn-sm">Crear</a>    
                            @endcan
                           
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
                                        @can('editar-category')
                                        <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary">Actualizar</a>   
                                        @endcan
                                        
                                        <td>
                                        <form  method="post" action="{{ url('dashboard/category/'.$category->id) }}"> 
                                            @method('DELETE')
                                            @csrf
                                            @can('borrar-category')
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


    
