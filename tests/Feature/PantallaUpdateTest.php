<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Orden;
use App\Models\Pantalla;
use App\Models\Estado;

class PantallaUpdateTest extends TestCase
{
    use RefreshDatabase;

    protected $orden;
    protected $pantalla;

    protected function setUp(): void
    {
        parent::setUp();

        // Estado base
        DB::table('estados')->insert([
            'id' => 1,
            'nombre' => 'PENDIENTE'
        ]);

        // Orden
        $this->orden = Orden::create([
            'orden_servicio' => 12345,
            'fecha_entrada' => now(),
            'hora' => now()->format('H:i:s'),
            'cliente' => 'Cliente Prueba',
            'telefono' => '1234567890',
            'domicilio' => 'Dirección X',
            'equipo' => 'Pantalla',
            'marca' => 'LG',
            'modelo' => 'ABC123',
            'numero_servicio' => 'NS123',
            'tipo_servicio' => 'CARGO A CLIENTE',
            'observacion' => 'Observación inicial',
        ]);

        // Pantalla
        $this->pantalla = Pantalla::create([
            'orden_id' => $this->orden->id,
            'orden_servicio' => 12345,
            'notas' => null
        ]);
    }

    public function test_actualiza_diagnostico_y_estatus()
    {
        Livewire::test(\App\Livewire\PantallaUpdate::class, [
            'pantalla' => $this->pantalla // 🔥 objeto completo
        ])
            ->set('diagnostico', 'Falla en backlight')
            ->set('estatus', 'reparado')
            ->set('costo_reparacion', 1200)
            ->call('save')
            ->assertRedirect(route('pantallas.index'));

        // 🔹 ORDEN
        $this->assertDatabaseHas('ordenes', [
            'id' => $this->orden->id,
            'diagnostico' => 'Falla en backlight',
            'estatus' => 'reparado',
        ]);

        // 🔹 PANTALLA
        $this->assertDatabaseHas('pantallas', [
            'id' => $this->pantalla->id,
            'detectado' => 'Falla en backlight',
        ]);

        // 🔹 ESTADO creado
        $this->assertDatabaseHas('estados', [
            'nombre' => 'REPARADO'
        ]);

        // 🔹 RELACIÓN estado_id
        $estado = Estado::where('nombre', 'REPARADO')->first();

        $this->assertNotNull($estado);

        $this->assertEquals(
            $estado->id,
            $this->pantalla->fresh()->estado_id
        );
    }

    public function test_costo_no_numerico_falla()
    {
        Livewire::test(\App\Livewire\PantallaUpdate::class, [
            'pantalla' => $this->pantalla // objeto completo
        ])
            ->set('costo_reparacion', 'no_numero')
            ->call('save')
            ->assertHasErrors(['costo_reparacion' => 'numeric']);
    }

    public function test_fechas_vacias_se_guardan_como_null()
    {
        Livewire::test(\App\Livewire\PantallaUpdate::class, [
            'pantalla' => $this->pantalla // objeto completo
        ])
            ->set('entregado', '')
            ->set('fecha_revision', '')
            ->set('fecha_trabajo', '')
            ->call('save');

        $this->assertDatabaseHas('ordenes', [
            'id' => $this->orden->id,
            'entregado' => null,
            'fecha_reparacion' => null,
            'fecha_trabajo' => null,
        ]);
    }
}
