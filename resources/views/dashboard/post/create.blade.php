<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('dashboard.partials.session-status')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.session-status')
                    <form action="{{ route("post.store") }}" method="POST">
                        @include('dashboard.partials.validation-error')  

                        @csrf
                        {{-- form:post --}}
                        {{-- Fila 1 --}}
                        <div class="row">
                            {{-- .row para crear una fila --}}
                            <div class="form-group">
                                <label for="name">Nombre</label><input class="form-control" type="text" name="name" id="name">
                            </div>
                        </div>
                    
                        {{-- Fila 2 --}}
                        <div class="row form-group">
                            <label for="category_id">Categoria</label>
                            <select  name="category" id="category">
                                <option value="">Seleccione una categoria</option>
                                @foreach ( $category as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Fila 3 --}}
                        
                        <div class="row form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
                            
                        </div>
                        <div class="row form-group">
                            
                            <input  type="hidden" name="autor" id="autor" value="{{ $usuario}}">
                           
                        </div>
                    
                        
                        
                        {{-- Fila 4 --}}
                        <div class="row center">
                            {{-- Las columnas en bootstrap tienen un ancho de 12
                                añadir 2 input en una fila: 12/cantidadInput --}}
                            <div class="col s6">
                                <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                                <a href="{{ url('dashboard/post') }}" class="btn btn-secondary bt-sm">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






