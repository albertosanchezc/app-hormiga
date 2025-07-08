<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Orden de Servicio</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            margin: 20px;
        }

        .container {
            border: 1px solid #000;
            padding: 10px;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .header-left,
        .header-center,
        .header-right {
            display: inline-block;
            vertical-align: top;
        }

        .header-left {
            width: 25%;
        }

        .header-center {
            width: 45%;
            text-align: center;
            font-size: 10px;
        }

        .header-right {
            width: 25%;
            text-align: right;
            font-size: 10px;
        }

        .header img {
            width: 180px;
        }

        .info-table,
        .equipment-table,
        .observaciones-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            border: 1px solid #000;
            padding: 4px;
        }

        .title {
            font-weight: bold;
            background: #ddd;
        }

        .folio {
            color: red;
            font-size: small;
            margin: 0;
        }

        .fecha,
        .hora {
            color: black;
            font-size: small;
            margin: 0;
        }

        .folio-container,
        .fecha-container,
        .hora-container {
            border: 1px solid;
            padding: 0.1rem 0.3rem;
            display: inline-block;
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .datosLaHormiga {
            font-size: small;
        }

        .datosLaHormiga span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <img src="{{ public_path('img/logo.png') }}" alt="Logo">
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
                <p>Orden de Servicio:</p>
                <div class="folio-container">
                    <p class="folio" style="color: red;">{{ $orden->orden_servicio }}</p>
                </div>

                <p>Fecha de Entrada:</p>
                <div class="fecha-container">
                    <p class="fecha">{{ formatoFechaExtendida($orden->fecha_entrada) }}</p>
                </div>

                <p>Hora:</p>
                <div class="hora-container">
                    <p class="hora">{{ formatoNumericoToHora($orden->hora) }}</p>
                </div>
            </div>
        </div>

        <table class="info-table">
            <tr>
                <td class="title">Cliente</td>
                <td colspan="3">{{ $orden->cliente }}</td>
                <td class="title">Teléfono</td>
                <td>{{ $orden->telefono }}</td>
            </tr>
            <tr>
                <td class="title">Domicilio</td>
                <td colspan="5">{{ $orden->domicilio }}</td>
            </tr>
        </table>

        <table class="equipment-table">
            <tr>
                <td class="title">Equipo</td>
                <td>{{ $orden->equipo }}</td>
                <td class="title">Marca</td>
                <td>{{ $orden->marca }}</td>
                <td class="title">Modelo</td>
                <td>{{ $orden->modelo }}</td>
            </tr>
            <tr>
                <td class="title">Número de Serie</td>
                <td colspan="2">{{ $orden->numero_servicio }}</td>
                <td class="title">Tipo de Servicio</td>
                <td colspan="2">{{ $orden->tipo_servicio }}</td>
            </tr>
        </table>

        <table class="observaciones-table">
            <tr>
                <td class="title">Observaciones</td>
            </tr>
            <tr>
                <td style="height: 80px;">{{ $orden->observacion }}</td>
            </tr>
        </table>

        <div class="footer">
            <p>Gracias por su preferencia</p>
        </div>
    </div>
</body>

</html>
