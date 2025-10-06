@extends('layouts.app')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Notificaciones') }}
    </h2>
</x-slot>

@section('contenido')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-center my-10">{{ __('Mis Notificaciones') }}</h1>
                    <div class="divide-y divide-gray-200"></div>

                    @forelse ($notificacionesNoLeidas as $notificacion)
                        <div class="p-5 lg:flex lg:justify-between lg:items-center">
                            <div>
                                @if (isset($notificacion->data['orden']))
                                    <p>Orden: <span class="font-bold">{{ $notificacion->data['orden'] }}</span></p>
                                @endif

                                @if (isset($notificacion->data['cliente']))
                                    <p>Cliente: <span class="font-bold">{{ $notificacion->data['cliente'] }}</span></p>
                                @endif

                                @if (isset($notificacion->data['equipo']))
                                    <p>Equipo: <span class="font-bold">{{ $notificacion->data['equipo'] }}</span></p>
                                @endif

                                @if (isset($notificacion->data['observacion']))
                                    <p>Observación: <span class="font-bold">{{ $notificacion->data['observacion'] }}</span>
                                    </p>
                                @endif

                                @if (isset($notificacion->data['diagnostico']))
                                    <p>Diagnóstico: <span class="font-bold">{{ $notificacion->data['diagnostico'] }}</span>
                                    </p>
                                @endif

                                @if (isset($notificacion->data['estatus']))
                                    <p>Estado: <span class="font-bold">{{ $notificacion->data['estatus'] }}</span></p>
                                @endif

                                <p class="text-gray-500 text-sm mt-2">
                                    {{ $notificacion->created_at->diffForHumans() }}
                                </p>
                            </div>

                            <div class="mt-5 lg:mt-0">
                                {{-- Botón Ver Orden --}}
                                @if (!isset($notificacion->data['diagnostico']))
                                    <a href="{{ route('ordenes.show', $notificacion->data['orden']) }}" target="_blank">
                                        <x-boton-indigo class="w-full h-full flex items-center justify-center">
                                            {{ __('Ver Orden') }}
                                        </x-boton-indigo>
                                    </a>
                                @endif

                                {{-- Botón Ver Reporte Técnico --}}
                                @if (isset($notificacion->data['diagnostico']))
                                    <a href="{{ route('pantallas.show', $notificacion->data['orden']) }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <x-boton-indigo class="w-full h-full flex items-center justify-center">
                                            {{ __('Ver RT') }}
                                        </x-boton-indigo>
                                    </a>
                                @endif

                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600">No Hay Notificaciones Nuevas</p>
                    @endforelse

                    {{-- 📌 Notificaciones leídas --}}
                    <h2 class="text-xl font-bold mt-10 mb-4 text-gray-500">Leídas</h2>
                    @forelse ($notificacionesLeidas as $notificacion)
                        <div class="p-5 lg:flex lg:justify-between lg:items-center bg-gray-100 text-gray-500 rounded mb-2">
                            <div>
                                @if (isset($notificacion->data['orden']))
                                    <p>Orden: <span class="font-bold">{{ $notificacion->data['orden'] }}</span></p>
                                @endif
                                @if (isset($notificacion->data['cliente']))
                                    <p>Cliente: <span class="font-bold">{{ $notificacion->data['cliente'] }}</span></p>
                                @endif
                                @if (isset($notificacion->data['equipo']))
                                    <p>Equipo: <span class="font-bold">{{ $notificacion->data['equipo'] }}</span></p>
                                @endif
                                @if (isset($notificacion->data['observacion']))
                                    <p>Observación: <span class="font-bold">{{ $notificacion->data['observacion'] }}</span>
                                    </p>
                                @endif
                                @if (isset($notificacion->data['diagnostico']))
                                    <p>Diagnóstico: <span class="font-bold">{{ $notificacion->data['diagnostico'] }}</span>
                                    </p>
                                @endif
                                @if (isset($notificacion->data['estatus']))
                                    <p>Estado: <span class="font-bold">{{ $notificacion->data['estatus'] }}</span></p>
                                @endif
                                <p class="text-gray-400 text-sm mt-2">
                                    {{ $notificacion->created_at->diffForHumans() }}
                                </p>
                            </div>

                            <div class="mt-5 lg:mt-0">
                                {{-- Botón Ver Orden --}}
                                @if (!isset($notificacion->data['diagnostico']))
                                    <a href="{{ route('ordenes.show', $notificacion->data['orden']) }}" target="_blank">
                                        <x-boton-indigo class="w-full h-full flex items-center justify-center">
                                            {{ __('Ver Orden') }}
                                        </x-boton-indigo>
                                    </a>
                                @endif

                                {{-- Botón Ver Reporte Técnico --}}
                                @if (isset($notificacion->data['diagnostico']))
                                    <a href="{{ route('pantallas.show', $notificacion->data['orden']) }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <x-boton-indigo class="w-full h-full flex items-center justify-center">
                                            {{ __('Ver RT') }}
                                        </x-boton-indigo>
                                    </a>
                                @endif

                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-400">No hay notificaciones leídas</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
