<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private $name)
    {
        //
    }


   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("support@cmp.com")->view('mail.email-template')->with(['name' => $this->name])->subject('Meal plan');
    }
}
