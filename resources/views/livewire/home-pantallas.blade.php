<div x-data="{ openHistorial: false, ordenSeleccionada: null }">
    {{-- Hijo --}}
    <livewire:filtrar-pantallas />

    <div class="container contenedor-pantallas">
        <div class="p-5 w-full">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($pantallas as $pantalla)
                    <div
                        class="bg-white shadow-md rounded-xl p-4 border {{ $pantalla->estado?->border_clase ?? 'border-t-4 border-red-400' }} ">

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

                        {{-- Estados --}}
                        <div class="space-y-2 mb-3">

                            {{-- Estado administrativo --}}
                            <div class="flex items-center gap-2 flex-wrap">

                                <span class="font-semibold text-gray-700 text-sm">
                                    Estado Administrativo:
                                </span>

                                <span
                                    class="px-3 py-1 text-xs font-medium rounded-full
            {{ $pantalla->estado?->color_clase ?? 'bg-red-100 text-red-800' }}">

                                    {{ empty($pantalla->estado?->nombre) ? 'Pendiente de Actualizar Estado' : $pantalla->estado?->nombre }}

                                </span>

                            </div>

                            {{-- Estado técnico --}}
                                <div class="flex items-center gap-2 flex-wrap">

                                    <span class="font-semibold text-gray-700 text-sm">
                                        Estado Técnico:
                                    </span>

                                    <span
                                        class="px-3 py-1 text-xs font-medium rounded-full
                bg-indigo-100 text-indigo-900">

                                        {{ $pantalla->orden?->estadoTecnico?->nombre ?? 'Sin estado técnico' }}

                                    </span>

                                </div>

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

                            <a href="{{ route('ordenes.create', ['duplicar' => $pantalla->orden_servicio]) }}"
                                class="bg-indigo-200 hover:bg-indigo-300 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-indigo-900 uppercase tracking-widest duration-150 w-full">

                                Crear Reincidencia
                            </a>

                            @if ($pantalla->orden->tieneHistorial())
                                <button
                                    @click="
                                    openHistorial = true;

                                    ordenSeleccionada = {
                                        folio: '{{ $pantalla->orden->orden_servicio }}',
                                        marca: '{{ $pantalla->orden->marca }}',
                                        modelo: '{{ $pantalla->orden->modelo }}',
                                        serie: '{{ $pantalla->orden->numero_servicio }}',
                                        ingresos: {{ $pantalla->orden->cantidadIngresosPrevios() }},

                                        actual: {
                                            folio: '{{ $pantalla->orden->orden_servicio }}',
                                            tipo_servicio: @js($pantalla->orden->tipo_servicio),
                                            equipo: @js($pantalla->orden->equipo),
                                            diagnostico: @js($pantalla->orden->diagnostico),
                                            accion_correctiva: @js($pantalla->orden->accion_correctiva),
                                            tecnico: @js($pantalla->orden->tecnico),
                                            estatus: @js($pantalla->orden->estatus),
                                            fecha: @js(optional($pantalla->orden->fecha_entrada)->diffForHumans()),
                                        },
                                        
                                        historial: @js(
    $pantalla->orden->ingresosPrevios()->map(function ($ingreso) {
        return [
            'folio' => $ingreso->orden_servicio,
            'tipo_servicio' => $ingreso->tipo_servicio,
            'equipo' => $ingreso->equipo,
            'diagnostico' => $ingreso->diagnostico,
            'accion_correctiva' => $ingreso->accion_correctiva,
            'tecnico' => $ingreso->tecnico,
            'estatus' => $ingreso->estatus,
            'fecha' => optional($ingreso->fecha_entrada)->diffForHumans(),
        ];
    }),
)
                                    }
                                "
                                    class="bg-slate-200 hover:bg-slate-300 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-slate-800 uppercase tracking-widest duration-150 w-full">

                                    Ver Historial
                                    {{ $pantalla->orden->cantidadIngresosPrevios() }}

                                </button>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="mt-5">
                {{ $pantallas->links() }}
            </div>

        </div>
    </div>

    {{-- OVERLAY --}}
    <div x-show="openHistorial" x-transition.opacity class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40"
        @click="openHistorial = false" style="display: none;">
    </div>

    {{-- DRAWER --}}
    <div x-show="openHistorial" x-transition:enter="transform transition ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-full sm:w-[450px] bg-white shadow-2xl z-50 overflow-y-auto"
        style="display: none;">

        {{-- HEADER --}}
        <div class="flex items-center justify-between p-4 border-b">

            <div>
                <h2 class="text-lg font-bold text-gray-800"
                    x-text="`${ordenSeleccionada?.marca ?? ''} ${ordenSeleccionada?.modelo ?? ''}`">
                </h2>

                <p class="text-sm text-gray-500" x-text="`Serie: ${ordenSeleccionada?.serie || 'SIN SERIE'}`">
                </p>

                <p class="text-xs text-indigo-600 font-semibold mt-1"
                    x-text="`${ordenSeleccionada?.ingresos ?? 0} ingresos previos`">
                </p>
            </div>

            <button @click="openHistorial = false" class="text-gray-500 hover:text-gray-800 text-2xl leading-none">

                &times;

            </button>

        </div>

        {{-- CONTENIDO --}}
        <div class="p-4">
            {{-- ACTUAL --}}
            <div class="mb-8">

                <div class="flex items-center gap-2 mb-4">

                    <div class="h-[2px] flex-1 bg-indigo-200"></div>

                    <span class="text-xs font-bold tracking-widest text-indigo-700 uppercase">
                        Folio Actual
                    </span>

                    <div class="h-[2px] flex-1 bg-indigo-200"></div>

                </div>

                <div class="border-l-4 border-indigo-600 bg-indigo-50/50 pl-4 py-3 rounded-r-lg">

                    {{-- HEADER --}}
                    <div class="flex items-center justify-between">

                        <h3 class="font-bold text-gray-800" x-text="`Folio ${ordenSeleccionada?.actual?.folio}`">
                        </h3>

                        <span class="px-2 py-1 rounded-full text-xs bg-indigo-100 text-indigo-700 font-semibold">

                            ACTUAL

                        </span>

                    </div>

                    <div class="mt-3 grid grid-cols-2 gap-3">

                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">
                                Tipo Servicio
                            </p>

                            <p class="text-sm text-gray-800" x-text="ordenSeleccionada?.actual?.tipo_servicio || 'N/A'">
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">
                                Equipo
                            </p>

                            <p class="text-sm text-gray-800" x-text="ordenSeleccionada?.actual?.equipo || 'N/A'">
                            </p>
                        </div>

                    </div>



                    {{-- DIAGNOSTICO --}}
                    <div class="mt-3">

                        <p class="text-xs font-semibold text-gray-500 uppercase">
                            Diagnóstico
                        </p>

                        <p class="text-sm text-gray-800"
                            x-text="ordenSeleccionada?.actual?.diagnostico || 'Sin diagnóstico'">
                        </p>

                    </div>

                    {{-- ACCION --}}
                    <div class="mt-3">

                        <p class="text-xs font-semibold text-gray-500 uppercase">
                            Acción Correctiva
                        </p>

                        <p class="text-sm text-gray-800"
                            x-text="ordenSeleccionada?.actual?.accion_correctiva || 'Sin acción correctiva'">
                        </p>

                    </div>

                    {{-- FOOTER --}}
                    <div class="mt-3 flex items-center justify-between">

                        <div>

                            <p class="text-xs font-semibold text-gray-500 uppercase">
                                Técnico
                            </p>

                            <p class="text-sm text-gray-800"
                                x-text="ordenSeleccionada?.actual?.tecnico || 'No asignado'">
                            </p>

                        </div>

                        <span class="px-2 py-1 rounded-full text-xs bg-slate-100 text-slate-700"
                            x-text="ordenSeleccionada?.actual?.estatus || 'Sin estado'">
                        </span>

                    </div>

                </div>

            </div>

            <div class="flex items-center gap-2 mb-4">

                <div class="h-[1px] flex-1 bg-slate-200"></div>

                <span class="text-xs font-bold tracking-widest text-slate-500 uppercase">
                    Historial Técnico
                </span>

                <div class="h-[1px] flex-1 bg-slate-200"></div>

            </div>
            <template x-for="item in ordenSeleccionada?.historial" :key="item.folio">

                <div class="border-l-4 border-indigo-400 pl-4 py-3 mb-6">

                    {{-- HEADER --}}
                    <div class="flex items-center justify-between">

                        <h3 class="font-bold text-gray-800" x-text="`Folio ${item.folio}`">
                        </h3>

                        <span class="text-xs text-gray-500" x-text="item.fecha">
                        </span>

                    </div>

                    <div class="mt-3 grid grid-cols-2 gap-3">

                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">
                                Tipo Servicio
                            </p>

                            <p class="text-sm text-gray-800" x-text="item.tipo_servicio || 'N/A'">
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase">
                                Equipo
                            </p>

                            <p class="text-sm text-gray-800" x-text="item.equipo || 'N/A'">
                            </p>
                        </div>

                    </div>

                    {{-- DIAGNOSTICO --}}
                    <div class="mt-3">

                        <p class="text-xs font-semibold text-gray-500 uppercase">
                            Diagnóstico
                        </p>

                        <p class="text-sm text-gray-800" x-text="item.diagnostico || 'Sin diagnóstico'">
                        </p>

                    </div>

                    {{-- ACCION --}}
                    <div class="mt-3">

                        <p class="text-xs font-semibold text-gray-500 uppercase">
                            Acción Correctiva
                        </p>

                        <p class="text-sm text-gray-800" x-text="item.accion_correctiva || 'Sin acción correctiva'">
                        </p>

                    </div>

                    {{-- FOOTER --}}
                    <div class="mt-3 flex items-center justify-between">

                        <div>

                            <p class="text-xs font-semibold text-gray-500 uppercase">
                                Técnico
                            </p>

                            <p class="text-sm text-gray-800" x-text="item.tecnico || 'No asignado'">
                            </p>

                        </div>

                        <span class="px-2 py-1 rounded-full text-xs bg-slate-100 text-slate-700"
                            x-text="item.estatus || 'Sin estado'">
                        </span>

                    </div>

                </div>

            </template>

        </div>

    </div>
</div>
