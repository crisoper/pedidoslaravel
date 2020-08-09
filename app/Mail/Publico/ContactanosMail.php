<?php

namespace App\Mail\Publico;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMail extends Mailable
{
    use Queueable, SerializesModels;
    public $usuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $request )
    {
        $this->usuario = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email desde contactame' )
        ->view('publico.mail.contactamemail', [
            'usuario' => $this->usuario
        ])->with('info','Correo enviado');
    }
}
