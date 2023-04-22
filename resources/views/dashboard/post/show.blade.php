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
                   
                    <main>
                        <div class="container py-4">
                            <h1> Replicas a los Posts</h1>                            
                            <h2> Post:  {{ $post->name }}</h2>
                            <table class="table">
                                <thead>
                                    <tr>                                        
                                        <td>
                                        <h3> Fecha</h3>
                                        </td>
                                        <td>
                                        <h3>Comentario</h3>
                                        </td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($replys as $reply)

                                        <td>
                                            {{ $reply->created_at }}
                                        </td>
                                        
                                        <td>{{ $reply->description}}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table> 
                            
                            <div class="col s6">                                
                                <a href="{{ url('dashboard/post') }}" class="btn btn-secondary bt-sm">Cancelar</a>
                            </div>
                
                        
                        </div>  
                  
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>