<div class="container principal-container">
    <form wire:submit.prevent="save">
        {{-- HEADER --}}
        <div class="header">
            <div class="header-left">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>

            <div class="header-center">
                <p>
                    <strong>Reporte Técnico</strong><br>
                    Prol. Tecnológico No. 96-A esq. Orlando Col. La Florida CP. 76150<br>
                    Tels: (442) 215-95-99 y (442) 419 -27-45<br>
                    Santiago de Querétaro, Qro.<br>
                    www.serviciolahormiga.com.mx
                </p>
            </div>

            <div class="header-right">
                <label for="orden_servicio">Orden de Servicio:</label>
                <input id="orden_servicio" type="text" value="{{ $pantalla->orden_servicio }}" readonly disabled style="color: red; font-weight: bold;">

                <label for="fecha_entrada"><strong>Fecha Registro:</strong></label>
                <input id="fecha_entrada" type="date" wire:model="fecha_entrada">

                <label for="fecha_revision"><strong>Fecha Revisión:</strong></label>
                <input id="fecha_revision" type="date" wire:model="fecha_revision">
            </div>
        </div>

        {{-- CLIENTE Y OBSERVACIONES --}}
        <div class="cliente-observacion-container">
            <div class="cliente-container">
                <label for="cliente">Cliente</label>
                <input id="cliente" type="text" value="{{ $pantalla->orden->cliente }}" readonly disabled>
            </div>
            <div class="observacion_extra-container">
                <label class="cliente-container" for="observacion">Observaciones</label>
                <input id="observacion" type="text" wire:model="observacion" readonly disabled>
            </div>
        </div>

        {{-- DATOS EQUIPO --}}
        <div class="datos-equipo-container">
            <div class="tipo_servicio-container">
                <label for="tipo_servicio">Tipo de Servicio</label>
                <input id="tipo_servicio" type="text" value="{{ $pantalla->orden->tipo_servicio }}" readonly disabled>
            </div>
            <div class="equipo-container">
                <label for="equipo">Equipo</label>
                <input id="equipo" type="text" value="{{ $pantalla->orden->equipo }}" readonly disabled>
            </div>
            <div class="marca-container">
                <label for="marca">Marca</label>
                <input id="marca" type="text" value="{{ $pantalla->marca }}" readonly disabled>
            </div>
            <div class="modelo-container">
                <label for="modelo">Modelo</label>
                <input id="modelo" type="text" value="{{ $pantalla->orden->modelo }}" readonly disabled>
            </div>
            <div class="numero_servicio-container">
                <label for="numero_servicio">Número De Serie</label>
                <input id="numero_servicio" type="text" value="{{ $pantalla->orden->numero_servicio }}" readonly disabled>
            </div>
        </div>

        {{-- DIAGNOSTICO --}}
        <div class="diagnostico-container">
            <div>
                <label for="diagnostico">Diagnóstico Técnico</label>
                <input id="diagnostico" type="text" wire:model="diagnostico">
                @error('diagnostico') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="numero_orden"># De Orden C.S.A.</label>
                <input id="numero_orden" type="text" wire:model="numero_orden">
                @error('numero_orden') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="entregado">Entregado El</label>
                <input id="entregado" type="date" wire:model="entregado">
                @error('entregado') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- REVISION Y TERMINO --}}
        <div class="revision-termino-container">
            <div class="fecha_revision-container">
                <label for="fecha_revision">Fecha de Revisión</label>
                <input id="fecha_revision" type="date" wire:model="fecha_revision">
            </div>

            <div class="fecha_trabajo-container">
                <label for="fecha_trabajo">Fecha de Termino</label>
                <input id="fecha_trabajo" type="date" wire:model="fecha_trabajo">
            </div>

            <div class="tecnico-container">
                <label for="tecnico">Técnico</label>
                <input id="tecnico" type="text" wire:model="tecnico">
            </div>

            <div class="comprado_por-container">
                <label for="comprado_por">Comprado Por</label>
                <input id="comprado_por" type="text" value="{{ $pantalla->orden->comprado_por }}" readonly disabled>
            </div>

            <div class="fecha_compra-container">
                <label for="fecha_compra">Fecha de Compra</label>
                <input id="fecha_compra" type="text" value="{{ $pantalla->orden->fecha_compra }}" readonly disabled>
            </div>
        </div>

        {{-- ENTREGA --}}
        <div class="entrega-container">
            <div class="datos_entrega-container">
                <div class="accion_correctiva-container">
                    <label for="accion_correctiva">Acción Correctiva</label>
                    <input id="accion_correctiva" type="text" wire:model="accion_correctiva">
                </div>

                <div class="costo_estado-container">
                    <div class="costo_reparacion-container">
                        <label for="costo_reparacion">Costo de Reparación</label>
                        <input id="costo_reparacion" type="text" wire:model="costo_reparacion">
                    </div>

                    <div class="estatus-container">
                        <label for="estatus">Estado</label>
                        <input id="estatus" type="text" wire:model="estatus">
                    </div>
                </div>
            </div>

            <div class="firma-container">
                <label>Firma De Conformidad</label>
                <div>
                    <label for="fecha_firma">Fecha:</label>
                    <input id="fecha_firma" type="text" value="____/___/____" readonly disabled>
                </div>
            </div>
        </div>

        <button class="boton-azul" type="submit">Guardar</button>
    </form>

    @if (session()->has('success'))
        <div class="alerta-exito">{{ session('success') }}</div>
    @endif
</div>
