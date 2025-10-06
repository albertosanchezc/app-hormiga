<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // obtener las notificaciones no leidas
        $notificacionesNoLeidas = auth()->user()->unreadNotifications;
        $notificacionesLeidas = auth()->user()->readNotifications;
        // Marcar como leidas las notificaciones
        auth()->user()->unreadNotifications->markAsRead();
        return view('notificaciones.index', [
            'notificacionesNoLeidas' => $notificacionesNoLeidas,
            'notificacionesLeidas' => $notificacionesLeidas,

            
        ]);
    }
}
