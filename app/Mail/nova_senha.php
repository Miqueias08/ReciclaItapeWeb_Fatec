<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class nova_senha extends Mailable
{
    use Queueable, SerializesModels;
    private $dados;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from(config('app.MAIL_USERNAME'))
        ->view('emails.nova_senha')->with(['dados'=>$this->dados]);
    }
}
