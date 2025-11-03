<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pantalla;

class PantallaSeeder extends Seeder
{
    public function run(): void
    {
        Pantalla::create([
            'orden_servicio' => '32349',
            'marca' => 'HISENSE',
            'pulgadas' => null,
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Se reporta que se cicla en el logo',
            'detectado' => 'Da imagen pero no hay backlight, capacitor dañado mal main mal leds',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32325',
            'marca' => 'DACE',
            'pulgadas' => 'No aplica (disensador)',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'No enfría agua',
            'detectado' => 'Se probó Peltier y si enfría se detectaron dos componentes dañados en main ',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32359',
            'marca' => 'Black + Decker',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'No enciende',
            'detectado' => 'Protección térmica (bimetal) del magnetrón quemada',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32353',
            'marca' => 'SHARP',
            'pulgadas' => '~70',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => 'Mal main',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32326',
            'marca' => 'HKPRO',
            'pulgadas' => '32',
            'estado_id' => 8,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases y cable',
            'notas' => 'con bases y cable ',
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32331',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 8,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases',
            'notas' => 'Reporta que se apaga al poco tiempo de encendido, presenta una línea en la pantalla con bases',
            'detectado' => 3,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32334',
            'marca' => 'SAMSUNG',
            'pulgadas' => '43',
            'estado_id' => 8,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'no presenta iluminacion tiene imagen       de fondo y presenta audio',
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32339',
            'marca' => 'SAMSUNG',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 19,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'equipo no calienta y hace ruido al funcionar',
            'detectado' => 'No calienta, marcaba corto, posible falso contacto revisar magnetron',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32340',
            'marca' => 'HISENSE',
            'pulgadas' => '50',
            'estado_id' => 8,  // Ajusta según tu lógica de estados
            'recibido_con' => 'soporte y tornillos',
            'notas' => 'equipo se apaga ',
            'detectado' => 'fusible principal bien se detectó posible corto en interruptores de puerta',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32357',
            'marca' => 'HKPRO',
            'pulgadas' => 'No aplica (bocina)',
            'estado_id' => 7,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable de alimentación ',
            'notas' => 'No enciende',
            'detectado' => 'Mal main se realizó cambio',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32311',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => 'Flasheo en el panel, no enciende, no hace nada (mismo comportamiento con main nueva) mal leds',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32369',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => 'No da imagen,standby 2 blinks, leds no están encendiendo',
            'fecha_registro' => '2025-06-18',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32354',
            'marca' => 'Dispensador en caja',
            'pulgadas' => 'No aplica (Dispensador)',
            'estado_id' => 7,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Reporta que no enfría',
            'detectado' => 'Ventilador ok, no enciende el led de Enfriando,  Conector alimentación circuito de enfriado desconectado, reconectado.  Tras lo anterior (peltier, ventilador y led ok) se dejó conectado para probar si enfría',
            'fecha_registro' => null,
            'fecha_revision' => '2025-06-24',
        ]);
        Pantalla::create([
            'orden_servicio' => '32381',
            'marca' => 'HISENSE ',
            'pulgadas' => '55',
            'estado_id' => 12,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases',
            'notas' => 'Preguntar Falla que reporta',
            'detectado' => 'No da imagen,standby 2 blinks, leds no están encendiendo se probaron leds y no prendieron ',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32375',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 7,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Reportaba que se apagaba tras un tiempo, no se presentó falla en taller',
            'detectado' => 'No presentó falla Gera comentó que se entrega mañana (20/06/25)',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32260',
            'marca' => 'ROYAL',
            'pulgadas' => 'No aplica (Dispensador)',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable de alimentación ',
            'notas' => 'Cliente reporta que no enfría hace poco se cambió peltier y otra vez no enfría ',
            'detectado' => 'Mal Ventilador 12V 92mm 0.25A se probó en la tarjeta y recibe voltaje pero no da, se probó por fuera y tampoco dio ',
            'fecha_registro' => null,
            'fecha_revision' => '2025-06-19',
        ]);
        Pantalla::create([
            'orden_servicio' => '32366',
            'marca' => 'HISENSE',
            'pulgadas' => '80',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'No enciende, no se ha podido probar si da imagen ya que no enciende',
            'detectado' => 'Se probaron leds y hay al menos una tira que está mal',
            'fecha_registro' => null,
            'fecha_revision' => '2025-06-21',
        ]);
        Pantalla::create([
            'orden_servicio' => '32352',
            'marca' => 'BREVILLE',
            'pulgadas' => 'No aplica (Cafetera)',
            'estado_id' => 21,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cajita con articulos y piezas del molino, cable integrado',
            'notas' => 'Presenta fugas de agua',
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32313',
            'marca' => 'HONEYWELL',
            'pulgadas' => 'No aplica (Dispensador)',
            'estado_id' => 7,  // Ajusta según tu lógica de estados
            'recibido_con' => 'No aplica',
            'notas' => 'No surte agua',
            'detectado' => 'Conector del interruptor de puerta desconectado de la tarjeta, se cargó evidencia y se volvió a conectar, se hicieron pruebas del sensor de nivel todo ok',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => '2025-06-20',
        ]);
        Pantalla::create([
            'orden_servicio' => '32332',
            'marca' => 'SHARP',
            'pulgadas' => '52',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable de alimentación',
            'notas' => 'No enciende, tampoco enciende el standby sin imagen',
            'detectado' => 'Circuito integrado reventado en tarjeta de la fuente, sin voltaje de Standby,leds Ok',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32333',
            'marca' => 'SAMSUNG',
            'pulgadas' => '32',
            'estado_id' => 19,  // Ajusta según tu lógica de estados
            'recibido_con' => 'eliminador de voltaje',
            'notas' => 'panel rallado no se puede determinar el estado del panel y no cuenta con iluminacion',
            'detectado' => 'Led de standby enciende, si da imagen, sin backlight, se probaron leds y aparentemente están ok (probando en un sentido si encienden pero en el otro aunque no encienden si consumen)',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32335',
            'marca' => 'Bettter home & garden',
            'pulgadas' => 'No aplica (Ventilador 3 en 1)',
            'estado_id' => 7,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'enciende y marca p4 y no reacciona a controles',
            'detectado' => null,
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32348',
            'marca' => 'HISENSE',
            'pulgadas' => '50',
            'estado_id' => 22,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases ',
            'notas' => 'Equipo presenta corto en panel se intentará recuperar imagen',
            'detectado' => null,
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32361',
            'marca' => 'HISENSE',
            'pulgadas' => '40',
            'estado_id' => 18,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable de alimentación integrado sin accesorios',
            'notas' => 'No encedió en taller, cliente menciona que en su domicilio si encendió pero no tiene iluminación, no se pudo determinar el estado del panel',
            'detectado' => 'Mal leds (circuito abierto)',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => '2025-06-20',
        ]);
        Pantalla::create([
            'orden_servicio' => '32363',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'NINGUNO',
            'notas' => 'Se apaga al poco tiempo de encendida',
            'detectado' => null,
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32368',
            'marca' => 'SAMSUNG',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'SIN PLATO SIN ARO',
            'notas' => 'Equipo enciende pero no inicia trabajo (supongo que no calienta)',
            'detectado' => 'Enciende al conectarse normalmente puerta bien aparentemente, se probó darle inicio y no llegaba voltaje al primario del transformador, mal dos interlocks por el óxido',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => null,
        ]);

        Pantalla::create([
            'orden_servicio' => '32380',
            'marca' => 'HISENSE',
            'pulgadas' => '43',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Se recibió con soportes',
            'notas' => 'Reporta que se apaga sola',
            'detectado' => null,
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => '2025-06-26',
        ]);
        Pantalla::create([
            'orden_servicio' => '32356',
            'marca' => 'SHARP',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'SIN INFORMACION',
            'notas' => 'REPORTAN QUE ES PARA ENTREGAR',
            'detectado' => 'Enciende, da audio e imagen, sin backlight, mal leds',
            'fecha_registro' => '2025-06-23',
            'fecha_revision' => '2025-06-23',
        ]);
        Pantalla::create([
            'orden_servicio' => '32391',
            'marca' => 'WINIA',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'No aplica',
            'notas' => 'Reporta que en ocasiones no funciona',
            'detectado' => 'se detectó un interlock con falso contacto, se realizó el cambio, se probó y si calentó en la primer prueba',
            'fecha_registro' => '2025-06-23',
            'fecha_revision' => '2025-06-23',
        ]);
        Pantalla::create([
            'orden_servicio' => '32383',
            'marca' => 'TCL',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Reporta lineas en espera de reemplazo de tarjeta',
            'detectado' => 'Se intentó cambiar sin éxito el software id conm apoyo de TCL. En espera de tarjeta',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32392',
            'marca' => 'Midea',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Reporta que echó chispas, se detectaron restos de metal (biruta) dentro de la caja y tras probarlo por menos de 3 segundos echó chispas',
            'detectado' => 'Tiene pieza de metal dañada',
            'fecha_registro' => '2025-06-23',
            'fecha_revision' => '2025-06-23',
        ]);
        Pantalla::create([
            'orden_servicio' => '32388',
            'marca' => 'PANASONIC',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'No aplica',
            'notas' => 'No enciende al conectarse',
            'detectado' => 'Se revisó fusible - ok, bimetales bien con excepción del del magnetrón, se probó cambiar el bimetal y encendió pero con un zumbido, se probó el relé y no conmuta, siempre marca continuidad, cambiando relé se probó y no calienta al ver el magnetrón resulta que el mismo está roto, se cambió el magnetrón y ya calienta normalmente, no se autorizó reparación así que se devolvió el magnetrón, protección y relé con los que se recibió el equipo',
            'fecha_registro' => '2025-06-23',
            'fecha_revision' => '2025-06-24',
        ]);
        Pantalla::create([
            'orden_servicio' => '32396',
            'marca' => 'Hkpro',
            'pulgadas' => '43',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases',
            'notas' => null,
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32408',
            'marca' => 'HISENSE',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases',
            'notas' => 'Presenta líneas verticales',
            'detectado' => 'Se hicieron pruebas de desconección de un flex a la vez y las líneas no desaparecieron, se midieron algunos voltajes, aparentemente bien, falta revisar hoja de datos del integrado grande de la tcon para rastrear los voltajes',
            'fecha_registro' => '2025-06-27',
            'fecha_revision' => '2025-06-27',
        ]);
        Pantalla::create([
            'orden_servicio' => '32385',
            'marca' => 'Hisense',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Enciende, muestra el logo con backlight y se apaga, 2 blinks standby',
            'detectado' => 'Se probaron leds - ok, bocinas ok, Dos capacitores inflados en la power board, se reemplazaron y ya se solucionó la falla',
            'fecha_registro' => '2025-06-28',
            'fecha_revision' => '2025-06-28',
        ]);
        Pantalla::create([
            'orden_servicio' => '32418',
            'marca' => 'Hisense',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Comentan que revise leds',
            'detectado' => 'Se probaron leds y no encendieron ni consumieron voltaje(leds abiertos) se midió voltaje que reciben los leds y si está llegando voltaje',
            'fecha_registro' => '2025-06-28',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32355',
            'marca' => 'TCL',
            'pulgadas' => '32',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Con bases y control',
            'notas' => null,
            'detectado' => 'Gera realizó el cambio de main',
            'fecha_registro' => '2025-06-28',
            'fecha_revision' => '2025-06-28',
        ]);
        Pantalla::create([
            'orden_servicio' => '32395',
            'marca' => 'nan',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Comentan que presentaba lineas',
            'detectado' => 'Se realizó cambio  de panel se probó en recepción, se conectó a internet y si funcionaron las bocinas, imagen ok',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);

        Pantalla::create([
            'orden_servicio' => '32412',
            'marca' => 'nan',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Revisada por Alfredo, comentan que faltó una tira de leds (refacción)',
            'detectado' => null,
            'fecha_registro' => '2025-07-01',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32407',
            'marca' => 'LG',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'No enciende, no da imagen, posible leds, main o fuente Reportar con Gera',
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32109',
            'marca' => 'nan',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Presenta líneas en panel',
            'detectado' => 'Panel en corto, tcon sin serigrafía',
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32303',
            'marca' => 'HISENSE',
            'pulgadas' => '50',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Bases, cable integrado',
            'notas' => 'No enciende, ciclada en el logo',
            'detectado' => 'Capacitores inflados',
            'fecha_registro' => '2025-07-05',
            'fecha_revision' => '2025-07-05',
        ]);
        Pantalla::create([
            'orden_servicio' => '32401',
            'marca' => 'Hkpro',
            'pulgadas' => '32',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32404',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Recibida en su caja',
            'notas' => 'No enciende, ciclada en el logo',
            'detectado' => 'Capacitores inflados',
            'fecha_registro' => '2025-07-08',
            'fecha_revision' => '2025-07-05',
        ]);
        Pantalla::create([
            'orden_servicio' => '32376',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Con bases rayadas',
            'notas' => 'Panel rayado no se puede determinar el estado del panel ya que no tiene iluminación',
            'detectado' => 'Se probaron leds y no consumieron voltaje',
            'fecha_registro' => '2025-06-19',
            'fecha_revision' => '2025-07-08',
        ]);
        Pantalla::create([
            'orden_servicio' => '31969',
            'marca' => 'Pendiente de sacarrrr por cambio físico',
            'pulgadas' => null,
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32400',
            'marca' => 'HKPro',
            'pulgadas' => '50',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => null,
            'fecha_registro' => null,
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32446',
            'marca' => 'HKPro',
            'pulgadas' => '50',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'Equipo no presenta audio',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32445',
            'marca' => 'SAMSUNG',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Revisión general del equipo',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32444',
            'marca' => 'SANSUI',
            'pulgadas' => '65',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'Presenta audio, no da imagen',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32442',
            'marca' => 'PANASONIC',
            'pulgadas' => '42',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'Equipo no enciende',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32440',
            'marca' => 'WINIA',
            'pulgadas' => 'LAVADORA',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32438',
            'marca' => 'SAMSUNG',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Plato y aro',
            'notas' => 'Sigue funcionando después de abrir la puerta',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32436',
            'marca' => 'LG',
            'pulgadas' => '65',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'No enciende, no cuenta con iluminación',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32435',
            'marca' => 'HISENSE',
            'pulgadas' => '50',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable integrado',
            'notas' => 'Equipo enciende y antes de iniciar se reinicia',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32434',
            'marca' => 'HKPro',
            'pulgadas' => 'No aplica (Aire acondicionado portatil)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Reportan que no enciende',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32433',
            'marca' => 'TCL',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'Pantalla flashea',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32432',
            'marca' => 'HKPro',
            'pulgadas' => '50',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Con control remoto',
            'notas' => 'No se conecta a internet',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32431',
            'marca' => 'FANCY',
            'pulgadas' => 'No aplica (Enfriador)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Con control remoto, gel refrigerante acumulador de frio',
            'notas' => 'No enfría',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32430',
            'marca' => 'LENOVO',
            'pulgadas' => 'NOTEBOOK',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => null,
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32429',
            'marca' => 'HKPro',
            'pulgadas' => 'No aplica (Minicomponente)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => null,
            'notas' => 'Reportan salida de audio no funciona, solo cerebro faltan los parlantes, cable integrado',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32425',
            'marca' => 'HISENSE',
            'pulgadas' => '50',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable integrado, con bases',
            'notas' => 'No enciende',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32424',
            'marca' => 'HISENSE',
            'pulgadas' => '55',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Cable integrado',
            'notas' => 'No da imagen',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32423',
            'marca' => 'SAMSUNG',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'SIN PLATO CON ARO',
            'notas' => 'Revisión general del equipo, pintura interna de puerta raspada y levantada',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32421',
            'marca' => 'SAMSUNG',
            'pulgadas' => 'No aplica (Microondas)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Plato y aro',
            'notas' => 'Cliente reporta que enciende pero no calienta, rayado en cubierta y cavidad, desgaste en membrana',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32417',
            'marca' => 'HP',
            'pulgadas' => 'No aplica (Impresora)',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'Reporta que presenta daño en cabezal',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
        Pantalla::create([
            'orden_servicio' => '32416',
            'marca' => 'HISENSE',
            'pulgadas' => '65',
            'estado_id' => 1,  // Ajusta según tu lógica de estados
            'recibido_con' => 'Sin accesorios',
            'notas' => 'Lineas en panel',
            'detectado' => null,
            'fecha_registro' => '2025-07-10',
            'fecha_revision' => null,
        ]);
    }
}
