<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden de Servicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 40px;
        }
        .header, .footer {
            text-align: center;
        }
        .header h2 {
            margin: 0;
        }
        .info, .equipo, .observaciones {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 4px;
            border: 1px solid #000;
        }
        .title {
            font-weight: bold;
            background: #eee;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('logo.png') }}" alt="Logo" style="height: 60px;"><br>
        <h2>SERVICIO LA HORMIGA</h2>
        <p>Prol. Tecnológico No. 96-A, Orlando, La Florida CP. 76150<br>
           Santiago de Querétaro, Qro.<br>
           Tel: (442) 215-95-99</p>
    </div>

    <div class="info">
        <table>
            <tr><td class="title">Orden de servicio</td><td colspan="3">{{ $orden->id }}</td></tr>
            <tr>
                <td class="title">Fecha de entrada</td><td>{{ $orden->fecha }}</td>
                <td class="title">Hora</td><td>{{ $orden->hora }}</td>
            </tr>
            <tr>
                <td class="title">Cliente</td><td colspan="3">{{ $orden->cliente }}</td>
            </tr>
            <tr>
                <td class="title">Teléfono</td><td>{{ $orden->telefono }}</td>
                <td class="title">Domicilio</td><td>{{ $orden->domicilio }}</td>
            </tr>
        </table>
    </div>

    <div class="equipo">
        <table>
            <tr>
                <td class="title">Equipo</td><td>{{ $orden->equipo }}</td>
                <td class="title">Marca</td><td>{{ $orden->marca }}</td>
                <td class="title">Modelo</td><td>{{ $orden->modelo }}</td>
            </tr>
            <tr>
                <td class="title">Número de Serie</td><td colspan="2">{{ $orden->num_serie }}</td>
                <td class="title">Tipo de servicio</td><td colspan="2">{{ $orden->tipo_servicio }}</td>
            </tr>
        </table>
    </div>

    <div class="observaciones">
        <table>
            <tr><td class="title">Observaciones</td></tr>
            <tr><td style="height: 100px;">{{ $orden->observaciones }}</td></tr>
        </table>
    </div>

    <div class="footer">
        <p>Gracias por su preferencia</p>
    </div>
</body>
</html>
