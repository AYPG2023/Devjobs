<?php

namespace App\Providers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(Lang::get('Confirme su correo electronico')) // Linea para personalizar el asunto del correo electrónico[El texto].
                ->line(Lang::get('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.'))
                ->action(Lang::get('Confirme su correo electronico'), $url)   // Esto es para poder personalizar el boton de verificación de correo electrónico.
                ->line(Lang::get('Si no ha creado una cuenta, no es necesario realizar ninguna otra acción.'));
        });   // Esto es para poder personalizar los mensajes de verificación de correo electrónico. 
    }
}
