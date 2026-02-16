<div>
    {{-- Hijo --}}
    <livewire:filtrar-pantallas />

    <div class="container contenedor-pantallas">
        <div class="p-5 w-full">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($pantallas as $pantalla)

                    <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200">

                        {{-- Folio --}}
                        <div class="text-sm text-gray-500 mb-2">
                            <span class="font-semibold text-gray-700">Folio:</span>
                            {{ $pantalla->orden_servicio }}
                        </div>

                        {{-- Estado con color dinámico --}}
                        <div class="text-sm mb-2">
                            <span class="font-semibold text-gray-700">Estado:</span>
                            <span class="px-2 py-1 text-xs rounded-full
                                @if($pantalla->estado?->nombre === 'Entregado')
                                    bg-green-100 text-green-800
                                @elseif($pantalla->estado?->nombre === 'En proceso')
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-gray-100 text-gray-800
                                @endif
                            ">
                                {{ $pantalla->estado?->nombre ?? 'Pendiente de Actualizar Estado' }}
                            </span>
                        </div>

                        {{-- Datos de Orden --}}
                        <div class="text-sm text-gray-500 space-y-1">

                            <div>
                                <span class="font-semibold text-gray-700">Equipo:</span>
                                {{ $pantalla->orden?->equipo ?? 'N/A' }}
                            </div>

                            <div>
                                <span class="font-semibold text-gray-700">Tipo de Servicio:</span>
                                {{ $pantalla->orden?->tipo_servicio ?? 'N/A' }}
                            </div>

                            <div>
                                <span class="font-semibold text-gray-700">Marca:</span>
                                {{ $pantalla->orden?->marca ?? 'N/A' }}
                            </div>

                            <div>
                                <span class="font-semibold text-gray-700">Modelo/Pulgadas:</span>
                                {{ $pantalla->orden?->modelo ?? 'N/A' }}
                            </div>

                            <div>
                                <span class="font-semibold text-gray-700">#Serie:</span>
                                {{ $pantalla->orden?->numero_servicio ?? 'N/A' }}
                            </div>

                        </div>

                        {{-- Recibido con --}}
                        <div class="text-sm text-gray-500 mt-2 break-words">
                            <span class="font-semibold text-gray-700">Recibido con:</span>
                            {{ $pantalla->recibido_con ?? 'N/A' }}
                        </div>

                        {{-- Notas --}}
                        @if ($pantalla->notas)
                            <div class="text-sm text-gray-500 mt-2 break-words">
                                <span class="font-semibold text-gray-700">Notas:</span>
                                {{ $pantalla->notas }}
                            </div>
                        @endif

                        {{-- Diagnóstico --}}
                        @if ($pantalla->orden?->diagnostico)
                            <div class="text-sm text-gray-500 mt-2 break-words">
                                <span class="font-semibold text-gray-700">Diagnóstico:</span>
                                {{ $pantalla->orden->diagnostico }}
                            </div>
                        @endif

                        {{-- Acción Correctiva --}}
                        @if ($pantalla->orden?->accion_correctiva)
                            <div class="text-sm text-gray-500 mt-2 break-words">
                                <span class="font-semibold text-gray-700">Acción Correctiva:</span>
                                {{ $pantalla->orden->accion_correctiva }}
                            </div>
                        @endif

                        {{-- Botones --}}
                        <div class="mt-4 grid grid-cols-2 gap-2">

                            <a href="{{ route('ordenes.show', $pantalla->orden_servicio) }}" target="_blank">
                                <x-primary-button class="w-full">
                                    Hoja Entrada
                                </x-primary-button>
                            </a>

                            <a href="{{ route('pantallas.show', $pantalla->orden_servicio) }}" target="_blank">
                                <x-boton-indigo class="w-full">
                                    Ver RT
                                </x-boton-indigo>
                            </a>

                            <a href="{{ route('ordenes.edit', $pantalla->orden_servicio) }}">
                                <x-boton-indigo class="w-full">
                                    Actualizar Hoja Entrada
                                </x-boton-indigo>
                            </a>

                            <a href="{{ route('pantallas.edit', $pantalla->orden_servicio) }}" target="_blank">
                                <x-primary-button class="w-full">
                                    Actualizar RT
                                </x-primary-button>
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
