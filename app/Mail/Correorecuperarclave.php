<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Correorecuperarclave extends Mailable
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
        return $this->view('encuestas.email.correo', [
            "usuario" => $this->usuario,
            "clave" => $this->clave,
        ]);
    }
    
}
