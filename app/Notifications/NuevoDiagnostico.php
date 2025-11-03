<?php

namespace App\Notifications;

use App\Models\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;


class NuevoDiagnostico extends Notification
{
    use Queueable;
    public $orden;

    public function __construct(Orden $orden)
    {
        $this->orden = $orden;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reporte Técnico Actualizado: ' . $this->orden->orden_servicio)
            ->greeting('Hola ' . $notifiable->name)
            ->line('El reporte técnico de la orden ha sido actualizado.')
            ->line('Cliente: ' . $this->orden->cliente)
            ->line('Diagnóstico: ' . $this->orden->diagnostico)
            ->line('Estado: ' . $this->orden->estatus)
            ->action('Ver Orden', url('/ordenes/' . $this->orden->orden_servicio))
            ->line('Gracias por usar nuestro sistema.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'orden_id' => $this->orden->id,
            'orden' => $this->orden->orden_servicio,
            'cliente' => $this->orden->cliente,
            'equipo' => $this->orden->equipo,
            'observacion' => $this->orden->observacion,
            'diagnostico' => $this->orden->diagnostico,
            'estatus' => $this->orden->estatus,
            'actualizado_en' => now(),
        ];
    }
}
