<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nueva Orden de Servicio</title>
    <style>
        /* Puedes reutilizar exactamente los estilos de tu vista original */
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            margin: 20px;
        }

        .container {
            border: 1px solid #000;
            padding: 10px;
        }

        input,
        textarea,
        select {
            width: 100%;
            border: none;
            outline: none;
            font-size: 10px;
            font-family: inherit;
            background: transparent;
        }

        .cliente,
        .telefono,
        .domicilio,
        .equipo,
        .marca,
        .modelo,
        .numero_servicio,
        .tipo_servicio,
        .observaciones {
            border: 2px solid;
        }
    </style>
</head>

<body>
    <div class="container">
        <form  method="POST">
            @csrf
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
                        <input type="text" name="orden_servicio" class="folio" required>
                    </div>

                    <p class="fecha-texto">Fecha de Entrada:</p>
                    <div class="fecha-container">
                        <input type="date" name="fecha_entrada" class="fecha" required>
                    </div>

                    <p class="hora-texto">Hora:</p>
                    <div class="hora-container">
                        <input type="time" name="hora" class="hora" required>
                    </div>
                </div>
            </div>

            <div class="cliente-telefono-contenedor">
                <div class="cliente-container">
                    <p>Cliente:</p>
                    <input type="text" name="cliente" class="cliente" required>
                </div>
                <div class="telefono-container">
                    <p>Teléfono:</p>
                    <input type="text" name="telefono" class="telefono">
                </div>
            </div>

            <div class="domicilio-container">
                <p>Domicilio:</p>
                <textarea name="domicilio" class="domicilio"></textarea>
            </div>

            <div class="contenedor-datos-equipo">
                <div class="equipo-container">
                    <p>Equipo:</p>
                    <input type="text" name="equipo" class="equipo">
                </div>
                <div class="marca-container">
                    <p>Marca:</p>
                    <input type="text" name="marca" class="marca">
                </div>
                <div class="modelo-container">
                    <p>Modelo:</p>
                    <input type="text" name="modelo" class="modelo">
                </div>
                <div class="numero_servicio-container">
                    <p>Núm. De Serie:</p>
                    <input type="text" name="numero_servicio" class="numero_servicio">
                </div>
                <div class="tipo_servicio-container">
                    <p>Tipo de Servicio:</p>
                    <input type="text" name="tipo_servicio" class="tipo_servicio">
                </div>
            </div>

            <div class="observaciones-container">
                <p>Observaciones:</p>
                <textarea name="observacion" class="observaciones"></textarea>
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
    </div>
</body>

</html>
