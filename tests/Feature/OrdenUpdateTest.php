<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Orden;
use Illuminate\Support\Facades\DB;

class OrdenUpdateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear estado necesario para la FK
        DB::table('estados')->insert([
            'id' => 153,
            'nombre' => 'En Revisión'
        ]);

        // Crear orden de prueba
        $this->orden = Orden::create([
            'orden_servicio' => 32953,
            'fecha_entrada' => now(),
            'hora' => now()->format('H:i:s'),
            'cliente' => 'Alberto Sánchez Camacho',
            'telefono' => '4641230877',
            'domicilio' => 'Manuel Gutiérrez Nájera 420A',
            'equipo' => 'Pantalla',
            'marca' => 'Hisense',
            'modelo' => '55H6B',
            'numero_servicio' => '55G151278H00112',
            'tipo_servicio' => 'CARGO A CLIENTE',
            'comprado_por' => 'Cliente',
            'fecha_compra' => null,
            'lugar_compra' => null,
            'observacion' => 'REVISION 400/ SE VE AZUL ANTERIORMENTE LA TENIAN EN OTRO PUERTO Y SE VEIA PERFECTA',
        ]);
    }

    public function test_cliente_actualizable()
    {
        Livewire::test(\App\Livewire\OrdenUpdate::class, ['orden' => $this->orden->id])
            ->set('cliente', 'Cliente Actualizado')
            ->set('fecha_compra', '2025-12-16')
            ->call('save');

        $this->assertDatabaseHas('ordenes', [
            'id' => $this->orden->id,
            'cliente' => 'Cliente Actualizado',
            'fecha_compra' => '2025-12-16',
        ]);
    }

    public function test_fecha_compra_invalida_falla()
    {
        Livewire::test(\App\Livewire\OrdenUpdate::class, ['orden' => $this->orden->id])
            ->set('fecha_compra', '16/12/2025')
            ->call('save')
            ->assertHasErrors(['fecha_compra']);
    }

    public function test_hora_invalida_falla()
    {
        Livewire::test(\App\Livewire\OrdenUpdate::class, ['orden' => $this->orden->id])
            ->set('hora', '25:99')
            ->call('save')
            ->assertHasErrors(['hora']);
    }

    public function test_campos_requeridos_no_pueden_quedar_vacios()
    {
        Livewire::test(\App\Livewire\OrdenUpdate::class, ['orden' => $this->orden->id])
            ->set('cliente', '')
            ->set('telefono', '')
            ->set('equipo', '')
            ->call('save')
            ->assertHasErrors(['cliente', 'telefono', 'equipo']);
    }
}