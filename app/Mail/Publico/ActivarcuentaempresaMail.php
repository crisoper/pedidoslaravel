<?php

namespace App\Mail\Publico;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivarcuentaempresaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $usuario )
    {
        $this->user = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Activar cuenta en PedidosApp' )
        ->view('publico.mail.activarcuentaempresa', [
            'usuario' => $this->user
        ]);
    }
}
