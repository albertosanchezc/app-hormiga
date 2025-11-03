@extends('layouts.app')


@section('contenido')
    <div class="container">
        <h1 class="mb-4">Listado de Pantallas</h1>
        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Buscar Pantalla') }}
            </x-primary-button>
        </div>




        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">


            @foreach ($pantallas as $pantalla)
                <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200">
                    <div class="text-sm text-gray-500 mb-2">
                        <span class="font-semibold text-gray-700">Folio:</span> {{ $pantalla->orden_servicio }}
                    </div>

                    <div class="text-sm text-gray-500 mb-2">
                        <span class="font-semibold text-gray-700">Estado:</span>
                        {{ $pantalla->estado->nombre ?? 'Sin estado' }}
                    </div>

                    <div class="text-sm text-gray-500 mb-2">
                        <span class="font-semibold text-gray-700">Recibido con:</span>
                        {{ $pantalla->recibido_con ?? 'N/A' }}
                    </div>

                    <div class="text-sm text-gray-500">
                        <span class="font-semibold text-gray-700">Notas:</span> {{ $pantalla->notas ?? 'Sin notas' }}
                    </div>

                    <div class="">
                        <x-primary-button>
                            <a href="/ordenes/{{ $pantalla->orden_servicio }}">{{ __('Hoja Entrada') }}</a>
                        </x-primary-button>

                        <x-secondary-button>
                            <a href="/pantallas/{{ $pantalla->orden_servicio }}/edit">{{ __('Actualizar Estado') }}</a>
                        </x-secondary-button>
                    </div>

                </div>
            @endforeach
        </div>


        {{ $pantallas->links() }}
    </div>
@endsection
