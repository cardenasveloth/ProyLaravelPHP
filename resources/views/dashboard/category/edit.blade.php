<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error')
                    @include('dashboard.partials.session-status')
                    <form action="{{ route('category.update',$category->id) }}" method="POST">

                        @method('PUT')
                        
                        @csrf
                        {{-- form:post --}}
                        {{-- Fila 1 --}}
                        <div class="row">
                            {{-- .row para crear una fila --}}
                            <div class="form-group">
                                <label for="name">Nombre</label><input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
                            </div>
                        </div>

                        {{-- Fila 2 --}}
                        <div class="row form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description" rows="10">{{ $category->description }}</textarea>
                        </div>

                        {{-- Fila3 --}}
                        <div class="row center">
                            {{-- Las columnas en bootstrap tienen un ancho de 12
                                añadir 2 input en una fila: 12/cantidadInput --}}
                            <div class="col s6">
                                <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                                <a href="{{ url('dashboard/category') }}" class="btn btn-secondary bt-sm">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

