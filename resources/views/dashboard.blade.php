@extends('layouts.app')

@section('contenido')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST">
                        @csrf
                        <div class="md:grid md:grid-cols-3 gap-5">
                            <div class="mb-5">
                                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="folio">Número de
                                    Folio
                                </label>
                                <input id="folio" type="text" placeholder="Folio: ej. 32345"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                    wire:model="folio" />
                            </div>

                            <div class="mb-5">
                                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="cliente">Nombre
                                    del Cliente
                                </label>
                                <input id="cliente" type="text"
                                    placeholder="Cliente: ej. Alberto Sánchez Camacho"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                    wire:model="cliente" />
                            </div>

                            <div class="mb-5">
                                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="marca">Marca
                                </label>
                                <input id="marca" type="text"
                                    placeholder="Marca: ej. Hisense"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                    wire:model="marca" />
                            </div>

                            <div class="mb-5">
                                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="numero_servicio">Número de Serie
                                </label>
                                <input id="numero_servicio" type="text"
                                    placeholder="Número de Serie: ej. IDF981909G-04835"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                    wire:model="numero_servicio" />
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <input type="submit"
                                class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                                value="Buscar" />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
