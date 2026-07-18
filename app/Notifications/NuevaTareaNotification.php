<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaTareaNotification extends Notification
{
    use Queueable;

     protected $tarea;
protected $titulo;
protected $mensaje;

public function __construct($tarea, $titulo, $mensaje)
{
    $this->tarea = $tarea;
    $this->titulo = $titulo;
    $this->mensaje = $mensaje;
}
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
          return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
       public function toArray($notifiable)
    {
           return [
        'titulo' => $this->titulo,
        'mensaje' => $this->mensaje,
        'tarea_id' => $this->tarea->id,
    ];
        
    }
}
