<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    // Definir las propiedades de la clase
    protected $id_vacante;
    protected $nombre_vacante;
    protected $usuario_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; //  'database' funciona para guardar el mensaje a la base de datos.
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Nuevo candidato para ' . $this->nombre_vacante)
                    ->line('Se ha postulado un nuevo candidato para la vacante: ' . $this->nombre_vacante)
                    ->action('Ver Candidato', url('/notificaiones/'))
                    ->line('Gracias por utilizar nuestra plataforma.');
    }

    /**
     * Almacenar en la base de datos
     */
    public function toDatabase(object $notifiable) : array 
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id,
            'mensaje' => 'Un nuevo candidato se ha postulado para la vacante ' . $this->nombre_vacante
        ];
    }
}
