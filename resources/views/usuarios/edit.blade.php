@extends('layouts.app')

@section('contenido')
<div class="max-w-2xl mx-auto py-8 px-4">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Editar Usuario
        </h1>
        <p class="text-gray-500">
            Modifica la información del usuario.
        </p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Nombre</label>

                <input type="text"
                    name="name"
                    value="{{ old('name', $usuario->name) }}"
                    class="w-full border rounded-lg px-3 py-2">

                @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Correo</label>

                <input type="email"
                    name="email"
                    value="{{ old('email', $usuario->email) }}"
                    class="w-full border rounded-lg px-3 py-2">

                @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Rol --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Rol</label>

                <select name="rol" class="w-full border rounded-lg px-3 py-2">

                    <option value="4" @selected(old('rol', $usuario->rol) == 4)>
                        Administrador
                    </option>

                    <option value="3" @selected(old('rol', $usuario->rol) == 3)>
                        Tracker / Recepción
                    </option>

                    <option value="2" @selected(old('rol', $usuario->rol) == 2)>
                        Recepción
                    </option>

                    <option value="1" @selected(old('rol', $usuario->rol) == 1)>
                        Técnico
                    </option>

                </select>

                @error('rol')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password (opcional) --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Nueva contraseña (opcional)
                </label>

                <input type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2">

                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmación --}}
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Confirmar contraseña
                </label>

                <input type="password"
                    name="password_confirmation"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3">

                <a href="{{ route('usuarios.index') }}"
                    class="px-4 py-2 rounded-lg border">
                    Cancelar
                </a>

                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Actualizar
                </button>

            </div>

        </form>

    </div>

</div>
@endsection