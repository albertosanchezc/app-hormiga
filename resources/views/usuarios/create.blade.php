@extends('layouts.app')

@section('contenido')
<div class="max-w-2xl mx-auto py-8 px-4">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Nuevo Usuario
        </h1>
        <p class="text-gray-500">
            El administrador puede registrar usuarios del sistema.
        </p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Nombre</label>

                <input type="text"
                    name="name"
                    value="{{ old('name') }}"
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
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg px-3 py-2">

                @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Rol --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Rol</label>

                <select name="rol"
                    class="w-full border rounded-lg px-3 py-2">

                    <option value="">Seleccione un rol</option>

                    <option value="4" @selected(old('rol') == 4)>
                        Administrador
                    </option>

                    <option value="3" @selected(old('rol') == 3)>
                        Tracker / Recepción
                    </option>

                    <option value="2" @selected(old('rol') == 2)>
                        Recepción
                    </option>

                    <option value="1" @selected(old('rol') == 1)>
                        Técnico
                    </option>

                </select>

                @error('rol')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block font-semibold mb-2">Contraseña</label>

                <input type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2">

                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmación --}}
            <div class="mb-6">
                <label class="block font-semibold mb-2">Confirmar contraseña</label>

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
                    Guardar usuario
                </button>

            </div>

        </form>

    </div>

</div>
@endsection