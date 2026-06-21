<div class=" p-8 mb-4">
    <form wire:submit.prevent="leerDatosFormulario" class="grid grid-cols-4 gap-2">

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
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="telefono">Telefono
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
            <label
                class="block mb-1 text-sm text-gray-700 uppercase font-bold"
                for="estado">

                Estado Administrativo

            </label>

            <select
                wire:model="estado_id"
                id="estado"
                class="border p-2 rounded w-full text-center">

                <option value="">
                    -- Todos los estados --
                </option>

                <option value="0">
                    PENDIENTE DE ACTUALIZAR ESTADO
                </option>

                @foreach($estados as $estado)

                <option value="{{ $estado->id }}">
                    {{ $estado->nombre }}
                </option>

                @endforeach
            </select>
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="detectado">Diagnostico
            </label>
            <input type="text" wire:model="detectado" placeholder="Buscar por Diagnostico" class="border p-2 rounded w-full"
                id="detectado">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="numero_orden"># De Orden C.S.A.
            </label>
            <input type="text" wire:model="numero_orden" placeholder="Ej. Recicle" class="border p-2 rounded w-full font-bold"
                id="numero_orden">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="recibido_con">Observaciones / Recido Con
            </label>
            <input type="text" wire:model="recibido_con" placeholder="Buscar por Recibido Con" class="border p-2 rounded w-full"
                id="recibido_con">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="accion_correctiva">Acción Correctiva
            </label>
            <input type="text" wire:model="accion_correctiva" placeholder="Buscar por Acción Correctiva" class="border p-2 rounded w-full font-bold"
                id="accion_correctiva">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="desde">Desde:
            </label>
            <input type="date" wire:model="desde" class="border p-2 rounded w-full"
                id="desde">
        </div>

        <div class="block">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="hasta">Hasta:
            </label>
            <input type="date" wire:model="hasta" class="border p-2 rounded w-full"
                id="hasta">
        </div>


        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Buscar
        </button>
    </form>
</div>