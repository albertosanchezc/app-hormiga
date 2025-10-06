<div>
    {{-- Hijo --}}
    <livewire:filtrar-pantallas />

    {{-- Resultados --}}
    <div class="container contenedor-pantallas">
        <div class="p-5 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 lg gap-4">
                @foreach ($pantallas as $pantalla)
                    <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200">
                        <div class="text-sm text-gray-500 mb-2">
                            <span class="font-semibold text-gray-700">Folio:</span> {{ $pantalla->orden_servicio }}
                        </div>
                        <div class="text-sm text-gray-500 mb-2">
                            <span class="font-semibold text-gray-700">Estado:</span>
                            {{ $pantalla->estado->nombre ?? 'Pendiente de Actualizar Estado' }}
                        </div>

                        @if ($pantalla->orden->equipo)
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold text-gray-700">Equipo:</span>
                                {{ $pantalla->orden->equipo ?? 'N/A' }}
                            </div>
                        @endif

                        @if ($pantalla->marca)
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold text-gray-700">Marca:</span>
                                {{ $pantalla->orden->marca ?? 'N/A' }}
                            </div>
                        @endif

                        @if ($pantalla->orden->modelo)
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold text-gray-700">Modelo/Pulgadas:</span>
                                {{ $pantalla->orden->modelo ?? 'N/A' }}
                            </div>
                        @endif

                        @if ($pantalla->orden->numero_servicio)
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-semibold text-gray-700">#Serie:</span>
                                {{ $pantalla->orden->numero_servicio ?? 'N/A' }}
                            </div>
                        @endif

                        <div class="text-sm text-gray-500 mb-2">
                            <span class="font-semibold text-gray-700">Recibido con:</span>
                            {{ $pantalla->recibido_con ?? 'N/A' }}
                        </div>

                        @if ($pantalla->notas)
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold text-gray-700">Notas:</span>
                                {{ $pantalla->notas ?? 'Sin notas' }}
                            </div>
                        @endif

                        @if ($pantalla->orden->diagnostico)
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold text-gray-700">Diagnóstico:</span>
                                {{ $pantalla->orden->diagnostico ?? 'Pendiente de diagnóstico' }}
                            </div>
                        @endif

                        @if ($pantalla->orden->accion_correctiva)
                            <div class="text-sm text-gray-500">
                                <span class="font-semibold text-gray-700">Acción Correctiva:</span>
                                {{ $pantalla->orden->accion_correctiva ?? 'Pendiente de reparar o diagnosticar' }}
                            </div>
                        @endif

                        <div class="mt-2 grid grid-cols-2 gap-2">
                            <a href="{{ route('ordenes.show', $pantalla->orden_servicio) }}" target="_blank"
                                rel="noopener noreferrer">
                                <x-primary-button
                                    class="w-full h-full flex items-center justify-center">{{ __('Hoja Entrada') }}</x-primary-button>
                            </a>

                            <a href="{{ route('pantallas.show', $pantalla->orden_servicio) }}" target="_blank"
                                rel="noopener noreferrer">
                                <x-boton-indigo
                                    class="w-full h-full flex items-center justify-center">{{ __('Ver RT') }}</x-boton-indigo>
                            </a>

                            <a href="{{ route('ordenes.edit', $pantalla->orden_servicio) }}">
                                <x-boton-indigo
                                    class="w-full h-full flex items-center justify-center">{{ __('Actualizar Hoja Entrada') }}</x-boton-indigo>
                            </a>

                            <a href="{{ route('pantallas.edit', $pantalla->orden_servicio) }}" target="_blank"
                                rel="noopener noreferrer">
                                <x-primary-button
                                    class="w-full h-full flex items-center justify-center">{{ __('Actualizar RT') }}</x-primary-button>
                            </a>
                        </div>


                    </div>
                @endforeach
            </div>

            <div class="mt-5">
                {{ $pantallas->links() }}
            </div>
        </div>
    </div>
</div>
