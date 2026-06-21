<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // dd('Desde Middleware');
        if($request->user()->rol !== 4){
            // En cso de que no tenga el rol de administrador, redireccionar al usario a home
            //tecnico administrativo tracker/recepcion son 1 2 y 3 respectivamente
            return redirect()->route('pantallas.index');
        }
        return $next($request);
    }
}
