<x-guest-layout>
    <form method="POST" novalidate action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('¿Qué tipo de Cuenta deseas en DevJobs?')" />

            <select name="rol" id="rol"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:fing-opacity-50 w-full uppercase">
                <option value="">-- Selecciona un Rol --</option>
                <option value="1">-- Técnico --</option>
                <option value="2">-- Administrativo --</option>
                <option value="3">-- Tracker/Recepción --</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>

            <x-link :href="route('password.request')">
                Olvidaste tu Password?
            </x-link>
        </div>

        <x-primary-button class="ms-4">
            {{ __('Registrar') }}
        </x-primary-button>
    </form>
</x-guest-layout>
