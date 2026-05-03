<div>
    {{-- Hijo --}}
    <livewire:filtrar-pantallas />

    <div class="container contenedor-pantallas">
        <div class="p-5 w-full">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($pantallas as $pantalla)
                    <div
                        class="bg-white shadow-md rounded-xl p-4 border border-gray-200 {{ $pantalla->estado?->border_clase ?? 'border-t-4 border-red-400' }} ">

                        {{-- Folio --}}
                        <div class="text-base text-gray-500 mb-2">
                            <span class="font-semibold text-gray-700">Folio:</span>
                            {{ $pantalla->orden_servicio }}
                        </div>

                        {{-- Tiempo --}}
                        <div class="space-y-1 mb-3">

                            {{-- Ingresó a taller hace --}}
                            <div class="text-xs text-gray-500">
                                Ingresó {{ $pantalla->orden->fecha_entrada?->diffForHumans() }}
                            </div>

                            {{-- Revisado --}}
                            @if ($pantalla->orden?->fecha_trabajo)
                                <div class="text-xs text-amber-600 font-medium">
                                    Diagnosticado {{ $pantalla->orden->fecha_trabajo->diffForHumans() }}
                                </div>
                            @endif

                            {{-- Reparado --}}
                            @if ($pantalla->orden?->fecha_reparacion)
                                <div class="text-xs text-blue-600 font-medium">
                                    Reparado {{ $pantalla->orden->fecha_reparacion->diffForHumans() }}
                                </div>
                            @endif

                            {{-- Entregado --}}
                            @if ($pantalla->orden?->entregado)
                                <div class="text-xs text-green-600 font-semibold">
                                    Entregado {{ $pantalla->orden->entregado->diffForHumans() }}
                                </div>
                            @endif



                            {{-- ================================================ --}}
                            {{-- ALERTA SIN MOVIMIENTO (FORMATO HUMANO) --}}
                            {{-- ================================================ --}}

                            @php

                                // Fechas importantes del proceso
                                $fechas = collect([
                                    $pantalla->orden?->fecha_entrada,
                                    $pantalla->orden?->fecha_trabajo,
                                    $pantalla->orden?->fecha_reparacion,
                                    $pantalla->orden?->entregado,
                                ])->filter();

                                // Último avance real
                                $ultimaFecha = $fechas->sortDesc()->first();

                                // Días sin movimiento
                                $dias = $ultimaFecha
                                    ? $ultimaFecha
                                        ->copy()
                                        ->startOfDay()
                                        ->diffInDays(now()->startOfDay())
                                    : 0;

                                // ¿Ya fue entregado?
                                $entregado = !empty($pantalla->orden?->entregado);

                                // ============================================
                                // TEXTO MÁS HUMANO
                                // ============================================
                                // 3 días
                                // 2 semanas
                                // 3 meses
                                // 1 año
                                // ============================================

                                if ($dias >= 365) {
                                    $tiempo = floor($dias / 365) . ' año' . (floor($dias / 365) > 1 ? 's' : '');
                                } elseif ($dias >= 30) {
                                    $tiempo = floor($dias / 30) . ' mes' . (floor($dias / 30) > 1 ? 'es' : '');
                                } elseif ($dias >= 7) {
                                    $tiempo = floor($dias / 7) . ' semana' . (floor($dias / 7) > 1 ? 's' : '');
                                } else {
                                    $tiempo = $dias . ' día' . ($dias > 1 ? 's' : '');
                                }

                            @endphp


                            @if (!$entregado && $dias >= 3)
                                <div class="text-xs text-red-600 font-semibold">
                                    ⏳ Sin movimiento hace {{ $tiempo }}
                                </div>
                            @endif
                        </div>

                        {{-- Estado con color dinámico --}}
                        <div class="text-sm mb-2">
                            <span class="font-semibold text-gray-700">Estado:</span>

                            <span
                                class="px-3 py-1 text-xs font-medium rounded-full  {{ $pantalla->estado?->color_clase ?? 'bg-red-100 text-red-800' }}">

                                {{ empty($pantalla->orden?->estatus) ? 'Pendiente de Actualizar Estado' : $pantalla->orden->estatus }}
                            </span>
                        </div>



                        {{-- Datos de Orden --}}
                        <div class="text-base text-gray-500 space-y-1">

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
                        <div class="text-base text-gray-500 mt-2 break-words">
                            <span class="font-semibold text-gray-700">Recibido con:</span>
                            {{ $pantalla->recibido_con ?? 'N/A' }}
                        </div>

                        {{-- Notas --}}
                        @if ($pantalla->notas)
                            <div class="text-base text-gray-500 mt-2 break-words">
                                <span class="font-semibold text-gray-700">Notas:</span>
                                {{ $pantalla->notas }}
                            </div>
                        @endif

                        {{-- Diagnóstico --}}
                        @if ($pantalla->orden?->diagnostico)
                            <div class="text-base text-gray-500 mt-2 break-words">
                                <span class="font-semibold text-gray-700">Diagnóstico:</span>
                                {{ $pantalla->orden->diagnostico }}
                            </div>
                        @endif

                        {{-- Acción Correctiva --}}
                        @if ($pantalla->orden?->accion_correctiva)
                            <div class="text-base text-gray-500 mt-2 break-words">
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

                            <a href="{{ route('pantallas.edit', $pantalla->orden_servicio) }}">
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
