<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PantallaController;
Route::get('/', function () {
    return view('pantallas.index'); // o la vista que uses para index
})->middleware('auth'); // 👈 protege la ruta

Route::get('/dashboard', [OrdenController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');// Las rutas estáticas deben estar antes de las que utilizan route model binding
Route::get('/ordenes/create', [OrdenController::class, 'create'])->name('ordenes.create');// Las rutas estáticas deben estar antes de las que utilizan route model binding
Route::post('/ordenes/store', [OrdenController::class, 'store'])->name('ordenes.store');
Route::get('/ordenes/{orden:orden_servicio}/show', [OrdenController::class, 'show'])->middleware(['auth', 'verified'])->name('ordenes.show');
Route::get('/ordenes/{orden:orden_servicio}/edit', [OrdenController::class, 'edit'])->middleware(['auth', 'verified'])->name('ordenes.edit');
Route::get('/orden/pdf/{orden:orden_servicio}', [OrdenController::class, 'generarPDF'])->name('orden.pdf');
Route::get('/pantallas', [PantallaController::class, 'index'])->middleware(['auth', 'verified'])->name('pantallas.index');
Route::get('/pantallas/{pantalla:orden_servicio}/show', [PantallaController::class, 'show'])->middleware(['auth', 'verified'])->name('pantallas.show');
Route::get('/pantallas/{pantalla:orden_servicio}/edit', [PantallaController::class, 'edit'])->middleware(['auth', 'verified'])->name('pantallas.edit');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Notificaciones
Route::get('/notificaciones',NotificacionController::class)->middleware(['auth', 'verified'])->name('notificaciones');


require __DIR__ . '/auth.php';
