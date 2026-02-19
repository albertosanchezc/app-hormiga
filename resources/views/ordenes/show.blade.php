<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Orden de Servicio - {{ $orden->orden_servicio }}</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            margin: 20px;
        }

        .container {
            border: 1px solid #000;
            padding: 10px;
            max-width: 75%;

        }

        .container-principal {
            max-width: 66.6%;
            margin: 0 auto;
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
            font-size: 10px;
            margin: 0;
            text-align: center;
        }

        .hora {
            font-weight: bold;
        }



        .cliente-telefono-contenedor {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 20px;
            font-size: 15px;
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


        .cliente-container p,
        .telefono-container p,
        .domicilio-container p,
        .equipo-container p,
        .marca-container p,
        .modelo-container p,
        .numero_servicio-container p,
        .tipo_servicio-container p,
        .observaciones-container p {
            padding: 0;
            margin: 0;
            font-weight: bold;
        }

        .observaciones-container {
            font-size: 15px;
        }



        .domicilio-container {
            font-size: 15px;
        }

        .contenedor-datos-equipo,
        .datos-compra-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            font-size: 15px;
            font-weight: bold;


        }


        .comprado_por,
        .fecha_compra,
        .lugar_compra,
        .domicilio-container .domicilio,
        .telefono-container .telefono{
            border: 2px solid;
            padding: 0.5rem 1rem;
        }




        .folio-container,
        .fecha-container,
        .hora-container {
            border: 2px solid;
            padding: 0.10px 0.30px;
            display: inline-block;
            margin-bottom: 5px;
        }

        .folio-container {
            width: 50%;
        }

        .folio {
            font-size: 15px;
            text-align: center;
            font-weight: bold;
        }

        .fecha {
            font-size: 15px;
            text-align: center;
            font-weight: bold;
        }

        .hora-container {
            width: 25%;
        }

        .folio-texto,
        .fecha-texto,
        .hora-texto {
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
            margin-bottom: 0;
        }

        .fecha-texto {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            border: 1px solid;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
        }

        .footer .parrafo-footer {
            text-transform: uppercase;
        }

        .footer-logos {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
        }

        .footer-logos img {
            width: 125px;
            height: auto;
        }

        .datosLaHormiga {
            font-size: 15px;
            .titulo-header{
                font-size: 2rem;
            }
        }

        .datosLaHormiga span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container container-principal">
        <div class="header">
            <div class="header-left">
                <img src="{{ $esPdf ? public_path('img/logo.png') : asset('img/logo.png') }}" alt="Logo">
            </div>

            <div class="header-center">
                <p class="datosLaHormiga">
                    <span class="titulo-header">Hoja de Entrada</span><br>
                    <span>Prol. Tecnológico No. 96-A esq. Orlando Col. La Florida CP. 76150</span><br>
                    <span>Santiago de Querétaro, Qro.</span><br>
                    <span>Tels: (442) 215-95-99 y (442) 419 -27-45</span><br>
                    <span>Whatsapp Mostrador: 442 215 95 99</span><br>
                    <span>Whatsapp Garantías: 442 474 47 04</span><br>
                    <span>www.serviciolahormiga.com.mx</span><br>
                    <span>Horario L. a V. 9:00 a 18:00 hrs Sab 10:00 a 13:00 hrs</span>
                </p>
            </div>

            <div class="header-right">
                <p class="folio-texto">Orden de Servicio:</p>
                <div class="folio-container">
                    <p class="folio" style="color: red;">{{ $orden->orden_servicio }}</p>
                </div>

                <p class="fecha-texto">Fecha de Entrada:</p>
                <div class="fecha-container">
                    <p class="fecha">{{ $orden->fecha_entrada?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>
                </div>

                <p class="hora-texto">Hora:</p>
                <div class="hora-container">
                    <p class="hora">{{ formatoNumericoToHora($orden->hora) }}</p>
                </div>
            </div>
        </div>

        <div class="cliente-telefono-contenedor">
            <div class="cliente-container">
                <p>Cliente:</p>
                <p class="cliente">{{ $orden->cliente }}</p>
            </div>
            <div class="telefono-container">
                <p>Telefono:</p>
                <p class="telefono">{{ $orden->telefono }}</p>
            </div>
        </div>

        <div class="domicilio-container">
            <div>
                <p>Domicilio:</p>
                <p class="domicilio">{{ $orden->domicilio ?? 'N/A' }}</p>
            </div>
        </div>
        {{-- Equipo, Marca, Modelo, Num. De Serie, tipo de servicio deben estar en un grid de 3 LOS 5 --}}
        {{-- falta añadir Comprado por Fecha de compra y lugar de compra --}}

        <div class="contenedor-datos-equipo">
            <div class="equipo-container">
                <p>Equipo:</p>
                <p class="equipo">{{ $orden->equipo }}</p>
            </div>
            <div class="marca-container">
                <p>Marca:</p>
                <p class="marca">{{ $orden->marca }}</p>
            </div>

            <div class="modelo-container">
                <p>Modelo:</p>
                <p class="modelo">{{ $orden->modelo }}</p>
            </div>

            <div class="numero_servicio-container">
                <p>Núm. De Serie:</p>
                <p class="numero_servicio">{{ $orden->numero_servicio }}</p>
            </div>
            <div class="tipo_servicio-container">
                <p>Tipo de Servicio:</p>
                <p class="tipo_servicio">{{ $orden->tipo_servicio }}</p>
            </div>
        </div>

        <div class="datos-compra-container">
            <div class="comprado_por-container">
                <p>Comprado Por:</p>
                <p class="comprado_por">{{ $orden->comprado_por }}</p>
            </div>

            <div class="fecha_compra-container">
                <p>Fecha de Compra:</p>
                <p class="fecha_compra">{{ $orden->fecha_compra }}</p>
            </div>

            <div class="lugar_compra-container">
                <p>Lugar de Compra:</p>
                <p class="lugar_compra">{{ $orden->lugar_compra }}</p>
            </div>




        </div>

        <div class="observaciones-container">
            <div>
                <p>Observaciones:</p>
                <p class="observaciones">{{ $orden->observacion }}</p>
            </div>
        </div>

        <div class="footer">
            <p class="parrafo-footer">-La Revisión tiene un costo Dependiendo del tipo de equipo y sus dimensiones ya
                sea taller o domicilio</p>
            <p class="parrafo-footer">-Después de 60 días de reparado el equipo no se responde por ningún trabajo y se
                cobra almacenaje $5.00 diarios</p>
            <p class="parrafo-footer">-No nos hacemos responsables por pérdida de información en su equipo electrónico
                favor de realizar su respaldo correspondiente antes de que ingrese a servicio su equipo</p>
            <div class="footer-logos">
                <img src="{{ $esPdf ? public_path('img/logo-samsung.jpg') : asset('img/logo-samsung.jpg') }}"
                    alt="Logo">
                <img src="{{ $esPdf ? public_path('img/logo-daewoo.png') : asset('img/logo-daewoo.png') }}"
                    alt="Logo">
                <img src="{{ $esPdf ? public_path('img/logo-hisense.png') : asset('img/logo-hisense.png') }}"
                    alt="Logo">
                <img src="{{ $esPdf ? public_path('img/logo-elektra.png') : asset('img/logo-elektra.png') }}"
                    alt="Logo">

            </div>
        </div>
    </div>
</body>

</html>
