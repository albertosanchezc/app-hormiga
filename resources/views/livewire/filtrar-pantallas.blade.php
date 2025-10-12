<div class=" p-8 mb-4">
    <form wire:submit.prevent="leerDatosFormulario" class="grid grid-cols-3 gap-2">

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="orden_servicio">Orden de Servicio
            </label>
            <input type="text" wire:model="orden_servicio" placeholder="Buscar por orden de servicio" id="orden_servicio"
                class="border p-2 rounded w-full">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="cliente">Cliente
            </label>
            <input type="text" wire:model="cliente" placeholder="Buscar por Cliente" id="cliente"
                class="border p-2 rounded w-full">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="domicilio">Domicilio
            </label>
            <input type="text" wire:model="domicilio" placeholder="Buscar por Domicilio" id="domicilio"
                class="border p-2 rounded w-full">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="telefono">Teléfono
            </label>
            <input type="text" wire:model="telefono" placeholder="Buscar por telefono" id="telefono"
                class="border p-2 rounded w-full">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="equipo">Equipo
            </label>
            <input type="text" wire:model="equipo" placeholder="Buscar por Equipo" id="equipo"
                class="border p-2 rounded w-full">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="marca">Marca
            </label>
            <input type="text" wire:model="marca" placeholder="Buscar por Marca" class="border p-2 rounded w-full"
                id="marca">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="modelo">Modelo
            </label>
            <input type="text" wire:model="modelo" placeholder="Buscar por Modelo" class="border p-2 rounded w-full"
                id="modelo">
        </div>


        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="numero_servicio">Número de Serie
            </label>
            <input type="text" wire:model="numero_servicio" placeholder="Buscar por Número de Serie"
                class="border p-2 rounded w-full" id="numero_servicio">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="tipo_servicio">Tipo de Servicio
            </label>
            <input type="text" wire:model="tipo_servicio" placeholder="Buscar por Tipo de Servicio"
                class="border p-2 rounded w-full" id="tipo_servicio">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="numero_servicio">Estado
            </label>
            <input type="text" wire:model="estatus" placeholder="Buscar por Estado" class="border p-2 rounded w-full"
                id="estado">
        </div>





        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Buscar
        </button>
    </form>
</div>
