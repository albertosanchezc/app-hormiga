@extends('layouts.app')

@section('contenido')
    <div class="max-w-4xl mx-auto py-8 px-4">

        {{-- Encabezado --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                Estados Administrativos
            </h1>
            <p class="text-gray-500 mt-1">
                Agrega nuevos estados para el seguimiento de las órdenes de servicio.
            </p>
        </div>

        {{-- Tarjeta --}}
        <div class="bg-white shadow rounded-lg p-6 border">

            <form action="{{ route('estados.update', $estado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre del Estado
                    </label>

                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $estado->nombre) }}"
                        placeholder="Ej. TERMINADO / LISTO PARA ENTREGA"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md font-medium">
                        Guardar Estado
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
