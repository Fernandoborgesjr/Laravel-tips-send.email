<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use stdClass;

class newLaravelTips extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // Como não está trabalhando direto com o modelo, o objeto está sendo
    //passado como stdClass
    public function __construct(stdClass $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Esse é o assunto do e-mail');
        //To recebe como parametros o endereço e o nome da pessoa
        $this->to($this->user->email, $this->user->name);
        return $this->markdown('mail.newLaravelTips', ['user' => $this->user->name]);
    }
}
