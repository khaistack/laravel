<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $u;

    public function __construct($user)
    {
        $this->u = $user;
    }

    /**s
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->from("makeBykhai@groupMagiao.com")->view('email-template',['test'=>$this->u]);
    }
}
