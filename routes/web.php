<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PantallaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/ordenes/{orden:orden_servicio}', [OrdenController::class, 'show'])->name('ordenes.show');
Route::get('/orden/pdf/{orden:orden_servicio}', [OrdenController::class, 'generarPDF'])->name('orden.pdf');
Route::get('/pantallas', [PantallaController::class, 'index'])->name('pantallas.index');
Route::get('/pantallas/{pantalla}/edit', [PantallaController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
