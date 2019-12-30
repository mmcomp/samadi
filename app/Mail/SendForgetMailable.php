<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForgetMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $newpassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newpassword)
    {
        $this->newpassword = $newpassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forget.send', ["newpassword"=>$this->newpassword]);
    }
}
