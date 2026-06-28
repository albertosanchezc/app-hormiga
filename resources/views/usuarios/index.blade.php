@extends('layouts.app')

@section('contenido')
<div class="max-w-6xl mx-auto py-8 px-4">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Usuarios
            </h1>
            <p class="text-gray-500">
                Administra los usuarios del sistema.
            </p>
        </div>

        <a href="{{ route('usuarios.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Nuevo usuario
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 border border-green-300 rounded p-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3">Nombre</th>
                    <th class="text-left px-4 py-3">Correo</th>
                    <th class="text-center px-4 py-3">Rol</th>
                    <th class="text-center px-4 py-3">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($usuarios as $usuario)
                    <tr class="border-t">
                        <td class="px-4 py-3">
                            {{ $usuario->name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $usuario->email }}
                        </td>

                        <td class="text-center px-4 py-3">
                            @switch($usuario->rol)
                                @case(4)
                                    <span class="text-red-600 font-semibold">
                                        Administrador
                                    </span>
                                    @break

                                @case(3)
                                    <span class="text-blue-600 font-semibold">
                                        Tracker/Recepción
                                    </span>
                                    @break

                                @case(2)
                                    <span class="text-green-600 font-semibold">
                                        Recepción
                                    </span>
                                    @break
                                @case(1)
                                    <span class="text-green-600 font-semibold">
                                        Técnico
                                    </span>
                                    @break

                                @default
                                    <span class="text-gray-500">
                                        Sin rol
                                    </span>
                            @endswitch
                        </td>

                        <td class="text-center px-4 py-3">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('usuarios.edit', $usuario) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    Editar
                                </a>

                                @if($usuario->id != auth()->id())
                                    <form action="{{ route('usuarios.destroy', $usuario) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Eliminar este usuario?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                            Eliminar
                                        </button>

                                    </form>
                                @endif

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">
                            No hay usuarios registrados.
                        </td>
                    </tr>

                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-6">
        {{ $usuarios->links() }}
    </div>

</div>
@endsection