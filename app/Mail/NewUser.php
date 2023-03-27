<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private $name,  private $email)
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from("Optimumfoodie@gmail.com")
        ->view('mail.newuser-template')
        ->with(['name' => $this->name, 'email' => $this->email])
        ->subject('New Account Created');
    }
}
