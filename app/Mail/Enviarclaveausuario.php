<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Enviarclaveausuario extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $clave;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $usuario, $clave )
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva clave de acceso')
                    ->view('admin.email.enviarclaveausuario', [
                        'usuario' => $this->usuario,
                        'clave' => $this->clave
                    ]);
    }
}
