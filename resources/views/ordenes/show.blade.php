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
            display: grid;
            grid-template-columns: 1fr 3fr 1fr;
            gap: .5rem;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .header img {
            width: 250px;
            margin-right: 15px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        header div p {
            font: large;
        }

        header span {
            font: bold;
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
            padding: .1rem;

        }

        .folio-container {
            border: 1px solid;
            width: fit-content;
            /* ajusta al contenido */
            padding: 0.3rem 0.6rem;
        }

        .fecha,
        .hora {
            color: black;
            padding: .1rem;

        }

        .fecha-container,
        .hora-container {
            border: 1px solid;
            width: fit-content;
            /* ajusta al contenido */
            padding: 0.2rem 0.1rem;
        }

        .section-title {
            font-weight: bold;
            text-align: left;
            margin-top: 10px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .service-number {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }

        .datosLaHormiga {
            text-align: center;
            font-size: large
        }

        .datosLaHormiga span {
            font-weight: bold;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div>

                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>

            <div>
                <p class="datosLaHormiga"><span> Prol. Tecnológico No. 96-A esq. Orlando Col. La Florida CP. 76150
                        Tels: (442) 215-95-99 y (442) 419 -27-45</span><br>
                    Whatsapp Mostrador: <span class="font-bold">442 215 95 99</span><br>
                    Whatsapp Garantías: <span class="font-bold">442 474 47 04</span></br>
                    Santiago de Querétaro, Qro.<br>
                    www.serviciolahormiga.com.mx<br>
                    <span>Horario L. a V. 9:00 a 18:00 hrs Sab 10:00 a 13:00 hrs</span>
                </p>
            </div>
            <div>

                <div class="service-number">
                    <p>Orden de Servicio:</p>
                    <div style="display: flex; justify-content: flex-end;">
                        <div class="folio-container">
                            <p class="folio">{{ $orden->orden_servicio }}</p>
                        </div>
                    </div>
                </div>

                <div class="service-number">
                    <p>Fecha de Entrada:</p>
                    <div style="display: flex; justify-content: flex-end;">
                        <div class="fecha-container">
                            <p class="fecha">{{ formatoFechaExtendida($orden->fecha_entrada) }}</p>
                        </div>
                    </div>
                </div>

                <div class="service-number">
                    <p>Hora:</p>
                    <div style="display: flex; justify-content: flex-end;">
                        <div class="hora-container">
                            <p class="hora">{{ formatoNumericoToHora($orden->hora) }}</p>
                        </div>
                    </div>
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
                <td>{{ $orden->domicilio }}</td>
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
