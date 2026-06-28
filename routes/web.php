<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EstadoTecnicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PantallaController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pantallas.index'); // o la vista que uses para index
})->middleware('auth'); // 👈 protege la ruta

Route::get('/dashboard', [OrdenController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard'); // Las rutas estáticas deben estar antes de las que utilizan route model binding
Route::get('/ordenes/create', [OrdenController::class, 'create'])->name('ordenes.create'); // Las rutas estáticas deben estar antes de las que utilizan route model binding
Route::post('/ordenes/store', [OrdenController::class, 'store'])->name('ordenes.store');
Route::post('/ordenes/{orden}/duplicar', [OrdenController::class, 'duplicar'])->name('ordenes.duplicar');
Route::get('/ordenes/{orden:orden_servicio}/show', [OrdenController::class, 'show'])->middleware(['auth', 'verified'])->name('ordenes.show');
Route::get('/ordenes/{orden:orden_servicio}/edit', [OrdenController::class, 'edit'])->middleware(['auth', 'verified'])->name('ordenes.edit');
Route::get('/orden/pdf/{orden:orden_servicio}', [OrdenController::class, 'generarPDF'])->name('orden.pdf');

Route::get('/pantallas', [PantallaController::class, 'index'])->middleware(['auth', 'verified'])->name('pantallas.index');
Route::get('/pantallas/{pantalla:orden_servicio}/show', [PantallaController::class, 'show'])->middleware(['auth', 'verified'])->name('pantallas.show');
Route::get('/pantallas/{pantalla:orden_servicio}/edit', [PantallaController::class, 'edit'])->middleware(['auth', 'verified'])->name('pantallas.edit');

Route::get('/estados', [EstadoController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados.index');
Route::get('estados/create', [EstadoController::class, 'create'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados.create');
Route::post('/estados', [EstadoController::class, 'store'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados.store');
Route::get('/estados/{estado}/edit', [EstadoController::class, 'edit'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados.edit');
Route::put('/estados/{estado}', [EstadoController::class, 'update'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados.update');
Route::delete('/estados/{estado}', [EstadoController::class, 'destroy'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados.destroy');


Route::get('/estados_tecnicos', [EstadoTecnicoController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados_tecnicos.index');
Route::get('estados_tecnicos/create', [EstadoTecnicoController::class, 'create'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados_tecnicos.create');
Route::post('/estados_tecnicos', [EstadoTecnicoController::class, 'store'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados_tecnicos.store');
Route::get('/estados_tecnicos/{estado_tecnico}/edit', [EstadoTecnicoController::class, 'edit'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados_tecnicos.edit');
Route::put('/estados_tecnicos/{estado_tecnico}', [EstadoTecnicoController::class, 'update'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados_tecnicos.update');
Route::delete('/estados_tecnicos/{estado_tecnico}', [EstadoTecnicoController::class, 'destroy'])->middleware(['auth', 'verified', 'rol.admin'])->name('estados_tecnicos.destroy');

Route::get('/tipos_servicios', [TipoServicioController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('tipos_servicios.index');
Route::get('tipos_servicios/create', [TipoServicioController::class, 'create'])->middleware(['auth', 'verified', 'rol.admin'])->name('tipos_servicios.create');
Route::post('/tipos_servicios', [TipoServicioController::class, 'store'])->middleware(['auth', 'verified', 'rol.admin'])->name('tipos_servicios.store');
Route::get('/tipos_servicios/{tipo_servicio}/edit', [TipoServicioController::class, 'edit'])->middleware(['auth', 'verified', 'rol.admin'])->name('tipos_servicios.edit');
Route::put('/tipos_servicios/{tipo_servicio}', [TipoServicioController::class, 'update'])->middleware(['auth', 'verified', 'rol.admin'])->name('tipos_servicios.update');
Route::delete('/tipos_servicios/{tipo_servicio}', [TipoServicioController::class, 'destroy'])->middleware(['auth', 'verified', 'rol.admin'])->name('tipos_servicios.destroy');


Route::get('/usuarios', [UserController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->middleware(['auth', 'verified', 'rol.admin'])->name('usuarios.create');
Route::post('/usuarios', [UserController::class, 'store'])->middleware(['auth', 'verified', 'rol.admin'])->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->middleware(['auth', 'verified', 'rol.admin'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->middleware(['auth', 'verified', 'rol.admin'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->middleware(['auth', 'verified', 'rol.admin'])->name('usuarios.destroy');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified'])->name('notificaciones');


require __DIR__ . '/auth.php';
