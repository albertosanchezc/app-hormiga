<form  method="POST">
    @csrf
    @method('PUT')

    <div class="header">
        <div class="header-left">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>

        <div class="header-center">
            <p class="datosLaHormiga">
                <span>Prol. Tecnológico No. 96-A esq. Orlando Col. La Florida CP. 76150<br>
                    Tels: (442) 215-95-99 y (442) 419 -27-45</span><br>
                Whatsapp Mostrador: <span>442 215 95 99</span><br>
                Whatsapp Garantías: <span>442 474 47 04</span><br>
                Santiago de Querétaro, Qro.<br>
                www.serviciolahormiga.com.mx<br>
                <span>Horario L. a V. 9:00 a 18:00 hrs Sab 10:00 a 13:00 hrs</span>
            </p>
        </div>

        <div class="header-right">
            <p class="folio-texto">Orden de Servicio:</p>
            <div class="folio-container">
                <input type="text" name="orden_servicio" class="folio"
                       value="{{ old('orden_servicio', $orden->orden_servicio) }}" required>
            </div>

            <p class="fecha-texto">Fecha de Entrada:</p>
            <div class="fecha-container">
                <input type="date" name="fecha_entrada" class="fecha"
                       value="{{ old('fecha_entrada', $orden->fecha_entrada ? $orden->fecha_entrada->format('Y-m-d') : '') }}" required>
            </div>

            <p class="hora-texto">Hora:</p>
            <div class="hora-container">
                <input type="time" name="hora" class="hora"
                       value="{{ old('hora', $orden->hora) }}" required>
            </div>
        </div>
    </div>

    <div class="cliente-telefono-contenedor">
        <div class="cliente-container">
            <p>Cliente:</p>
            <input type="text" name="cliente" class="cliente"
                   value="{{ old('cliente', $orden->cliente) }}" required>
        </div>
        <div class="telefono-container">
            <p>Teléfono:</p>
            <input type="text" name="telefono" class="telefono"
                   value="{{ old('telefono', $orden->telefono) }}">
        </div>
    </div>

    <div class="domicilio-container">
        <p>Domicilio:</p>
        <textarea name="domicilio" class="domicilio">{{ old('domicilio', $orden->domicilio) }}</textarea>
    </div>

    <div class="contenedor-datos-equipo">
        <div class="equipo-container">
            <p>Equipo:</p>
            <input type="text" name="equipo" class="equipo"
                   value="{{ old('equipo', $orden->equipo) }}">
        </div>
        <div class="marca-container">
            <p>Marca:</p>
            <input type="text" name="marca" class="marca"
                   value="{{ old('marca', $orden->marca) }}">
        </div>
        <div class="modelo-container">
            <p>Modelo:</p>
            <input type="text" name="modelo" class="modelo"
                   value="{{ old('modelo', $orden->modelo) }}">
        </div>
        <div class="numero_servicio-container">
            <p>Núm. De Serie:</p>
            <input type="text" name="numero_servicio" class="numero_servicio"
                   value="{{ old('numero_servicio', $orden->numero_servicio) }}">
        </div>
        <div class="tipo_servicio-container">
            <p>Tipo de Servicio:</p>
            <input type="text" name="tipo_servicio" class="tipo_servicio"
                   value="{{ old('tipo_servicio', $orden->tipo_servicio) }}">
        </div>
    </div>

    <div class="observaciones-container">
        <p>Observaciones:</p>
        <textarea name="observacion" class="observaciones">{{ old('observacion', $orden->observacion) }}</textarea>
    </div>

    <div class="footer">
        <p class="parrafo-footer">-La Revisión tiene un costo dependiendo del tipo de equipo y sus dimensiones
            ya sea taller o domicilio</p>
        <p class="parrafo-footer">-Después de 60 días de reparado el equipo no se responde por ningún trabajo y
            se cobra almacenaje $5.00 diarios</p>
        <p class="parrafo-footer">-No nos hacemos responsables por pérdida de información en su equipo
            electrónico, favor de realizar su respaldo correspondiente antes de que ingrese a servicio su equipo
        </p>
    </div>

    <div style="text-align: center; margin-top:20px;">
        <button type="submit">Guardar Orden</button>
    </div>
</form>
