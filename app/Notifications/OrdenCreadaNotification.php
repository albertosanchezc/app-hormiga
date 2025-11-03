<?php

namespace App\Notifications;

use App\Models\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrdenCreadaNotification extends Notification
{
    use Queueable;


    protected $orden;

    /**
     * Create a new notification instance.
     */

    public function __construct(Orden $orden)
    {
        $this->orden = $orden;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        // Puedes usar ['mail', 'database'] si quieres guardarlas también
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nueva Orden Creada: ' . $this->orden->orden_servicio)
            ->greeting('Hola ' . $notifiable->name)
            ->line('Se ha registrado nuevo equipo.')
            ->line('Equipo: ' . $this->orden->equipo)
            ->line('Modelo: ' . $this->orden->modelo)
            ->line('Observacion: ' . $this->orden->observacion)
            ->action('Ver Orden', url('/ordenes/' . $this->orden->orden_servicio))
            ->line('Gracias por usar nuestro sistema.');
    }

    /**
     * Notificación guardada en la BD.
     */
    public function toDatabase($notifiable)
    {
        return [
            'orden_id'   => $this->orden->id,
            'orden'      => $this->orden->orden_servicio,
            'cliente'    => $this->orden->cliente,
            'equipo'     => $this->orden->equipo,
            'observacion'     => $this->orden->observacion,
            'creada_en'  => now(),
        ];
    }
}
