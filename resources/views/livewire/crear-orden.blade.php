{{-- resources/views/livewire/crear-orden.blade.php --}}
<div>

    <form wire:submit.prevent="crearOrden">
        <div class="cliente-telefono-contenedor">
            <div class="cliente-container">
                <label>Cliente</label>
                <input type="text" name="cliente" class="cliente" wire:model="cliente">
                @error('cliente')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="telefono-container">
                <label>Telefono</label>
                <input type="text" name="telefono" class="telefono" wire:model="telefono">
                @error('telefono')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="domicilio-container">
            <label>Domicilio</label>
            <input type="text" name="domicilio" class="domicilio" wire:model="domicilio">
            @error('domicilio')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="contenedor-datos-equipo">
            <div class="equipo-container">
                <label>Equipo</label>
                <input type="text" name="equipo" class="equipo" wire:model="equipo">
                @error('equipo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="marca-container">
                <label>Marca</label>
                <input type="text" name="marca" class="marca" wire:model="marca">
                @error('marca')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="modelo-container">
                <label>Modelo</label>
                <input type="text" name="modelo" class="modelo" wire:model="modelo">
                @error('modelo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="numero_servicio-container">
                <label>Núm. De Serie</label>
                <input type="text" name="numero_servicio" class="numero_servicio" wire:model="numero_servicio">
                @error('numero_servicio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="tipo_servicio-container">
                <label>Tipo de Servicio</label>
                <input type="text" name="tipo_servicio" class="tipo_servicio" wire:model="tipo_servicio">
                @error('tipo_servicio')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>
        </div>

        <div class="datos-compra-container">
            <div class="comprado_por-container">
                <label>Comprado Por</label>
                <input type="text" name="comprado_por" class="comprado_por" wire:model="comprado_por">
                @error('comprado_por')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="fecha_compra-container">
                <label>Fecha de Compra</label>
                <input type="text" name="fecha_compra" class="fecha_compra" wire:model="fecha_compra">
                @error('fecha_compra')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="lugar_compra-container">
                <label>Lugar de Compra</label>
                <input type="text" name="lugar_compra" class="lugar_compra" wire:model="lugar_compra">
                @error('lugar_compra')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="observaciones-container">
            <label>Observaciones</label>
            <textarea name="observacion" class="observaciones" wire:model="observacion"></textarea>
            @error('observacion')
                <span class="error">{{ $message }}</span>
            @enderror

        </div>

        <button class="boton-azul" type="submit">Guardar</button>
    </form>
</div>
