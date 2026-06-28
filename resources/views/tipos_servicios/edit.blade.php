@extends('layouts.app')

@section('contenido')
    <div class="max-w-4xl mx-auto py-8 px-4">

        {{-- Encabezado --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                Estados Técnicos
            </h1>
            <p class="text-gray-500 mt-1">
                Actualiza el nombre del Estado Técnico
            </p>
        </div>

        {{-- Tarjeta --}}
        <div class="bg-white shadow rounded-lg p-6 border">

            <form action="{{ route('tipos_servicios.update', $tipo_servicio->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre del Tipo de Servicio
                    </label>

                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $tipo_servicio->nombre) }}"
                        placeholder="Ej. G.E. EKT"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
{{-- Activo --}}
<div class="mb-4 flex items-center justify-between">
    <label for="activo" class="block text-sm font-medium text-gray-700">
        Activo
    </label>

    <input type="hidden" name="activo" value="0">

    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox"
               id="activo"
               name="activo"
               value="1"
               class="sr-only peer"
               {{ old('activo', $tipo_servicio->activo) ? 'checked' : '' }}>

        <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none rounded-full peer
                    peer-checked:bg-indigo-600
                    after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                    after:bg-white after:border-gray-300 after:border after:rounded-full
                    after:h-5 after:w-5 after:transition-all
                    peer-checked:after:translate-x-full">
        </div>
    </label>
</div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md font-medium">
                        Guardar Tipo de Servicio
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
