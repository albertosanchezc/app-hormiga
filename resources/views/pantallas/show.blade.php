@extends('layouts.app')

@section('title', 'Actualizar Folio interno - ' . $pantalla->orden_servicio)

@section('contenido')
    <div class="container principal-container">
        <div class="header">
            <div class="header-left">
                <img src="{{ $esPdf ? public_path('img/logo.png') : asset('img/logo.png') }}" alt="Logo">
            </div>

            <div class="header-center">
                <p class="datosLaHormiga">
                    <strong>Reporte Técnico</strong><br>
                    Prol. Tecnológico No. 96-A esq. Orlando Col. La Florida CP. 76150<br>
                    Tels: (442) 215-95-99 y (442) 419 -27-45<br>
                    Whatsapp Mostrador: 442 215 95 99<br>
                    Whatsapp Garantías: 442 474 47 04<br>
                    www.serviciolahormiga.com.mx<br>
                    Horario L. a V. 9:00 a 18:00hrs Sab. 10:00 a 13:00 hrs<br>
                    
                </p>
            </div>

            <div class="header-right">
                <p>Orden de Servicio:</p>
                <p style="color: red; font-weight: bold;">{{ $pantalla->orden_servicio }}</p>

                <p><strong>Fecha Registro:</strong></p>
                <p>{{ $orden->fecha_entrada?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>

                <p><strong>Fecha Revisión:</strong></p>
                <p>{{ $orden->fecha_trabajo?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>
            </div>
        </div>

        <div class="cliente-observacion-container">
            <div class="cliente-container">
                <p>Cliente</p>
                <p class="cliente">{{ $orden->cliente }}</p>
            </div>
            <div class="observacion_extra-container">
                <p>Observaciones</p>
                <p class="observacion_extra">{{ $orden->observacion }}</p>
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
                <p>Número De Servicio</p>
                <p class="numero_servicio">{{ $orden->numero_servicio }}</p>
            </div>
        </div>

        <div class="diagnostico-container">
            <div>
                <p>Diagnóstico Técnico</p>
                <p class="diagnostico">{{ $orden->diagnostico }}</p>
            </div>

            <div>
                <p># De Orden C.S.A.</p>
                <p class="numero_csa">{{ $pantalla->numero_orden }}</p>
            </div>

            <div>
                <p>Entregado El</p>
                <p class="entregado">{{ $pantalla->entregado }}</p>
            </div>
        </div>

        <div class="revision-termino-container">
            <div class="fecha_revision-container">
                <p>Fecha de Revisión</p>
                <p class="fecha_revision">{{ $orden->fecha_trabajo?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>
            </div>

            <div class="fecha_trabajo-container">
                <p>Fecha de Término</p>
                <p class="fecha_trabajo">{{ $orden->fecha_reparacion?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>
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
                <p class="fecha_compra">{{ $orden->fecha_compra?->translatedFormat('l d \\d\\e F \\d\\e Y') ?? '' }}</p>
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
            <p class="parrafo-footer">Reparación de T.V., Minicomponentes,Pantallas de Plasma, Proyección, LCD y LED, Hornos de Microondas, DVD, Refrigeradores, Lavadoras, Aire Acondicionado, Etc. Todas Las Marcas y Modelos, Centro de servicio autorizado en garantías Daewoo, Samsung, Elektra, Garanplus, Venta, Armado, Reparación y Mantenimiento de Computadoras, Monitores, ETC.
            </p>

            <div class="footer-logos">
                <img src="http://localhost/img/logo-samsung.jpg" alt="Logo">
                <img src="http://localhost/img/logo-daewoo.png" alt="Logo">
                <img src="http://localhost/img/logo-hisense.png" alt="Logo">
                <img src="http://localhost/img/logo-elektra.png" alt="Logo">

            </div>
        </div>
    </div>
@endsection
