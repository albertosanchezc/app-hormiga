@extends('layouts.app')

@section('contenido')
    <div class="max-w-7xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                Tipos de Servicios
            </h1>

            <a href="{{ route('tipos_servicios.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                Nuevo Tipo de Servicio
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @foreach ($tipos_servicios as $tipo_servicio)
                <div class="bg-white shadow rounded-lg p-4 border">

                    <h2 class="font-semibold text-lg">
                        {{ $tipo_servicio->nombre }}
                    </h2>


                    <div class="flex justify-between items-center">
                        <div class="mt-4">

                            <a href="{{ route('tipos_servicios.edit', $tipo_servicio) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                Editar
                            </a>
                        </div>


                        <form action="{{ route('tipos_servicios.destroy', $tipo_servicio) }}" method="POST"
                            onsubmit="return confirm('¿Eliminar Tipo de Servicio?')">

                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm mt-4">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="mt-6">
            {{ $tipos_servicios->links() }}
        </div>

    </div>
@endsection
