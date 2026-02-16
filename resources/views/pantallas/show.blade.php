<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte Técnico - {{ $orden->orden_servicio }}</title>
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

        /* .fecha_revision-container,
        .fecha_trabajo-container,
        .tecnico-container,
        .comprado_por-container,
        .fecha_compra-container,
        .costo_reparacion-container,
        .estatus-container {
            margin: 5px auto;
        } */

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



        .cliente-telefono-contenedor,
        .diagnostico-container p {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 20px;
            font-size: 15px;
            margin: 5px auto;
        }

        .cliente,
        .telefono,
        .domicilio,
        .equipo,
        .marca,
        .modelo,
        .numero_servicio,
        .tipo_servicio,
        .observaciones,
        .diagnostico,
        .numero_csa,
        .entregado,
        .accion_correctiva,
        .costo_reparacion,
        .estatus {
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
        .observaciones-container p,
        .diagnostico-container p,
        .fecha_revision-container p,
        .fecha_trabajo-container p,
        .tecnico-container p,
        .comprado_por-container p,
        .fecha_compra-container p,
        .numero_csa,
        .accion_correctiva-container p,
        .costo_reparacion-container p,
        .estatus-container p {
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

        .datos-compra-container,
        .diagnostico-container,
        .revision-termino-container,
        .entrega-container {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 10px;
            font-size: 15px;
            font-weight: bold;
        }


        .comprado_por,
        .fecha_compra,
        .lugar_compra,
        .domicilio-container .domicilio,
        .numero_csa,
        .entregado,
        .fecha_revision,
        .fecha_trabajo,
        .tecnico,
        .costo_reparacion,
        .firma-container,
        .diagnostico-container .diagnostico,
        .diagnostico-container .numero_csa,
        .diagnostico-container .entregado,
        .accion_correctiva-container .accion_correctiva,
        .estatus-container .estatus,
        .fecha_revision-container .fecha_revision,
        .fecha_trabajo-container .fecha_trabajo,
        .tecnico-container .tecnico,
        .comprado_por-container .comprado_por,
        .fecha_compra-container .fecha_compra,
        .costo_estado-container .costo_reparacion {
            border: 2px solid;
            padding: 0.5rem 1rem;
        }

        .firma-container {
            display: grid;
            grid-template-rows: repeat(2, 1fr);
        }

        .entrega-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
        }

        .costo_estado-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .revision-termino-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            margin: 0;
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
            gap: 10px;
        }

        .footer-logos img {
            width: 125px;
            height: auto;
        }

        .datosLaHormiga {
            font-size: 15px;

            .titulo-header {
                font-size: 2rem;
            }
        }

        .datosLaHormiga span {
            font-weight: bold;
        }

        .cliente-observaciones-contenedor {
            display: grid;
            grid-template-columns: 2fr 2fr;
            gap: 1rem;
            font-size: 1rem;
        }

        .contenedor-datos-equipo {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            font-size: 1rem;
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
                    <span class="titulo-header">Reporte Técnico</span><br>
                    <span>Prol. Tecnológico No. 96-A casi esq. Orlando Col. La Florida CP. 76150</span><br>
                    <span>Santiago de Querétaro, Qro.</span><br>
                    <span>Tels: (442) 215-95-99 y (442) 419 -27-45</span><br>
                    <span>Whatsapp Mostrador: 442 215 95 99</span><br>
                    <span>Whatsapp Garantías: 442 474 47 04</span><br>
                    <span>www.serviciolahormiga.com.mx</span><br>
                    <span>Horario L. a V. 9:00 a 18:00hrs Sab. 10:00 a 13:00 hrs</span><br>
                </p>
            </div>

            <div class="header-right">
                <p class="folio-texto">Orden de Servicio:</p>
                <div class="folio-container">
                    <p class="folio" style="color: red; font-weight: bold;">{{ $pantalla->orden_servicio }}</p>
                </div>

                <p class="fecha-texto">Fecha Registro:</p>
                <div class="fecha-container">
                    <p class="fecha">{{ $orden->fecha_entrada?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>
                </div>
            </div>
        </div>

        <div class="contenedor-datos-cliente">
            <div class="cliente-observaciones-contenedor">
                <div class="cliente-container">
                    <p>Cliente:</p>
                    <p class="cliente">{{ $orden->cliente }}</p>
                </div>
                <div class="observaciones-container">
                    <p>Observaciones:</p>
                    <p class="observaciones">{{ $orden->observacion }}</p>
                </div>
            </div>

            <div class="contenedor-datos-equipo">
                <div class="tipo_servicio-container">
                    <p>Tipo de Servicio</p>
                    <p class="tipo_servicio">{{ $orden->tipo_servicio }}</p>
                </div>
                <div class="equipo-container">
                    <p>Equipo</p>
                    <p class="equipo">{{ $orden->equipo }}</p>
                </div>
                <div class="marca-container">
                    <p>Marca</p>
                    <p class="marca">{{ $pantalla->marca }}</p>
                </div>
                <div class="modelo-container">
                    <p>Modelo</p>
                    <p class="modelo">{{ $orden->modelo }}</p>
                </div>
                <div class="numero_servicio-container">
                    <p>Número De Serie</p>
                    <p class="numero_servicio">{{ $orden->numero_servicio }}</p>
                </div>
            </div>
        </div>

        <div class="diagnostico-container">
            <div>
                <p class="diagnostico-texto">Diagnóstico Técnico</p>
                <p class="diagnostico">{{ $orden->diagnostico }}</p>
            </div>

            <div>
                <p class="numero_csa-texto"># De Orden C.S.A.</p>
                <p class="numero_csa">{{ $pantalla->numero_orden }}</p>
            </div>

            <div>
                <p class="entregado-texto">Entregado El</p>
                <p class="entregado">{{ $pantalla->entregado }}</p>
            </div>
        </div>
        {{-- Equipo, Marca, Modelo, Num. De Serie, tipo de servicio deben estar en un grid de 3 LOS 5 --}}
        {{-- falta añadir Comprado por Fecha de compra y lugar de compra --}}

        <div class="revision-termino-container">
            <div class="fecha_revision-container">
                <p>Fecha de Revisión</p>
                <p class="fecha_revision">{{ $orden->fecha_trabajo?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}
                </p>
            </div>

            <div class="fecha_trabajo-container">
                <p>Fecha de Término</p>
                <p class="fecha_trabajo">
                    {{ $orden->fecha_reparacion?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}
                </p>
            </div>

            <div class="tecnico-container">
                <p>Técnico</p>
                <p class="tecnico">{{ $pantalla->tecnico }}</p>
            </div>

            <div class="comprado_por-container">
                <p>Comprado Por</p>
                <p class="comprado_por">{{ $orden->comprado_por }}</p>
            </div>

            <div class="fecha_compra-container">
                <p>Fecha de Compra</p>
                <p class="fecha_compra">{{ $orden->fecha_compra?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}
                </p>
            </div>
        </div>

        <div class="entrega-container">
            <div class="datos_entrega-container">
                <div class="accion_correctiva-container">
                    <p>Acción Correctiva</p>
                    <p class="accion_correctiva">{{ $orden->accion_correctiva }}</p>
                </div>

                <div class="costo_estado-container">
                    <div class="costo_reparacion-container">
                        <p>Costo de Reparación</p>
                        <p class="costo_reparacion">{{ $orden->costo_reparacion }}</p>
                    </div>

                    <div class="estatus-container">
                        <p>Estado</p>
                        <p class="estatus">{{ $orden->estatus }}</p>
                    </div>
                </div>
            </div>

            <div class="firma-container">
                <p>Firma De Conformidad</p>
                <div>
                    <p>Fecha:</p>
                    <p class="fecha">____/___/____</p>
                </div>
            </div>
        </div>



        <div class="footer">
            <p class="parrafo-footer">Reparación de T.V., Minicomponentes,Pantallas de Plasma, Proyección, LCD y LED,
                Hornos de Microondas, DVD, Refrigeradores, Lavadoras, Aire Acondicionado, Etc. Todas Las Marcas y
                Modelos, Centro de servicio autorizado en garantías Daewoo, Samsung, Elektra, Garanplus, Venta, Armado,
                Reparación y Mantenimiento de Computadoras, Monitores, ETC.
            </p>

            <div class="footer-logos">
                <img src="{{ asset('img/logo-samsung.jpg') }}" alt="Samsung">
                <img src="{{ asset('img/logo-daewoo.png') }}" alt="Daewoo">
                <img src="{{ asset('img/logo-hisense.png') }}" alt="Hisense">
                <img src="{{ asset('img/logo-elektra.png') }}" alt="Elektra">

            </div>
        </div>
    </div>
</body>

</html>