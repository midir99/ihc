<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class codigo_confirmacion extends Notification
{
    protected $correo;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $correo)
    {
        $this->correo = $correo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Confirmación de correo')
                    ->line('Hola '.$this->correo['name'].', gracias por registrarte en '.config('app.name'))
                    ->line('Por favor confirma tu correo electrónico.')
                    ->line('Para ello simplemente debes hacer click en el siguiente botón:')
                    ->action('Clic para confirmar tu email', url('/register/verificar/' .$this->correo['codigo']));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
