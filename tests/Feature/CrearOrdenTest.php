<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class CrearOrdenTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // 👇 Crear estado necesario para la FK
        DB::table('estados')->insert([
            'id' => 153,
            'nombre' => 'En revisión'
        ]);
    }

    public function test_fecha_compra_valida_se_guarda_correctamente()
    {
        Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('cliente', 'Test')
            ->set('telefono', '123456789')
            ->set('equipo', 'Celular')
            ->set('marca', 'Test')
            ->set('modelo', 'Test')
            ->set('numero_servicio', '123')
            ->set('tipo_servicio', 'Reparacion')
            ->set('observacion', 'Test')
            ->set('fecha_compra', '2025-12-16')
            ->call('crearOrden');

        $this->assertDatabaseHas('ordenes', [
            'fecha_compra' => '2025-12-16',
        ]);
    }

    public function test_fecha_compra_formato_incorrecto_falla()
    {
        Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('cliente', 'Test')
            ->set('telefono', '123456789')
            ->set('equipo', 'Celular')
            ->set('marca', 'Test')
            ->set('modelo', 'Test')
            ->set('numero_servicio', '123')
            ->set('tipo_servicio', 'Reparacion')
            ->set('observacion', 'Test')
            ->set('fecha_compra', '16/12/2025') // ❌ formato incorrecto
            ->call('crearOrden')
            ->assertHasErrors(['fecha_compra']);
    }


    public function test_fecha_compra_null_se_guarda_como_null()
    {
        Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('cliente', 'Test')
            ->set('telefono', '123456789')
            ->set('equipo', 'Celular')
            ->set('marca', 'Test')
            ->set('modelo', 'Test')
            ->set('numero_servicio', '123')
            ->set('tipo_servicio', 'Reparacion')
            ->set('observacion', 'Test')
            ->set('fecha_compra', null)
            ->call('crearOrden');

        $this->assertDatabaseHas('ordenes', [
            'fecha_compra' => null,
        ]);
    }


    public function test_fecha_compra_invalida_no_se_guarda()
    {
        Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('fecha_compra', '2025-99-99')
            ->call('crearOrden')
            ->assertHasErrors(['fecha_compra']);
    }

    public function test_no_se_crean_dos_ordenes_con_el_mismo_folio()
    {
        $component = Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('cliente', 'Test')
            ->set('telefono', '123456789')
            ->set('equipo', 'Celular')
            ->set('marca', 'Test')
            ->set('modelo', 'Test')
            ->set('numero_servicio', '123')
            ->set('tipo_servicio', 'Reparacion')
            ->set('observacion', 'Test');

        $component->call('crearOrden');
        $component->call('crearOrden');

        $this->assertEquals(1, \App\Models\Orden::count());
    }

    public function test_hora_invalida_falla()
    {
        Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('hora', '25:99')
            ->assertSet('hora', '25:99')
            ->call('crearOrden')
            ->assertHasErrors(['hora']);
    }


    public function test_no_falla_si_notificacion_explota()
    {
        \Notification::fake();

        Livewire::test(\App\Livewire\CrearOrden::class)
            ->set('cliente', 'Test')
            ->set('telefono', '123456789')
            ->set('equipo', 'Celular')
            ->set('marca', 'Test')
            ->set('modelo', 'Test')
            ->set('numero_servicio', '123')
            ->set('tipo_servicio', 'Reparacion')
            ->set('observacion', 'Test')
            ->call('crearOrden');

        $this->assertDatabaseCount('ordenes', 1);
    }
}
