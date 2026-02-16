{{-- resources/views/livewire/crear-orden.blade.php --}}
<div>

    <form wire:submit.prevent="crearOrden">
        <div class="cliente-telefono-contenedor">
            <div class="cliente-container">
                <label for="cliente">Cliente</label>
                <input id="cliente" type="text" name="cliente" class="cliente" wire:model="cliente">
                @error('cliente')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="telefono-container">
                <label for="telefono">Telefono</label>
                <input id="telefono" type="text" name="telefono" class="telefono" wire:model="telefono">
                @error('telefono')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="domicilio-container">
            <label for="domicilio">Domicilio</label>
            <input id="domicilio" type="text" name="domicilio" class="domicilio" wire:model="domicilio">
            @error('domicilio')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="contenedor-datos-equipo">
            <div class="equipo-container">
                <label for="equipo">Equipo</label>
                <input id="equipo" type="text" name="equipo" class="equipo" wire:model="equipo">
                @error('equipo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="marca-container">
                <label for="marca">Marca</label>
                <input id="marca" type="text" name="marca" class="marca" wire:model="marca">
                @error('marca')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="modelo-container">
                <label for="modelo">Modelo</label>
                <input id="modelo" type="text" name="modelo" class="modelo" wire:model="modelo">
                @error('modelo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="numero_servicio-container">
                <label for="numero_servicio">Núm. De Serie</label>
                <input id="numero_servicio" type="text" name="numero_servicio" class="numero_servicio" wire:model="numero_servicio">
                @error('numero_servicio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="tipo_servicio-container">
                <label for="tipo_servicio">Tipo de Servicio</label>
                <input id="tipo_servicio" type="text" name="tipo_servicio" class="tipo_servicio" wire:model="tipo_servicio">
                @error('tipo_servicio')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>
        </div>

        <div class="datos-compra-container">
            <div class="comprado_por-container">
                <label for="comprado_por">Comprado Por</label>
                <input id="comprado_por" type="text" name="comprado_por" class="comprado_por" wire:model="comprado_por">
                @error('comprado_por')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="fecha_compra-container">
                <label for="fecha_compra">Fecha de Compra</label>
                <input id="fecha_compra" type="text" name="fecha_compra" class="fecha_compra" wire:model="fecha_compra">
                @error('fecha_compra')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="lugar_compra-container">
                <label for="lugar_compra">Lugar de Compra</label>
                <input id="lugar_compra" type="text" name="lugar_compra" class="lugar_compra" wire:model="lugar_compra">
                @error('lugar_compra')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="observaciones-container">
            <label for="observacion">Observaciones</label>
            <textarea id="observacion" name="observacion" class="observaciones" wire:model="observacion"></textarea>
            @error('observacion')
                <span class="error">{{ $message }}</span>
            @enderror

        </div>

        <button class="boton-azul" type="submit">Guardar</button>
    </form>
</div>
