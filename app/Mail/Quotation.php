<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Quotation extends Mailable
{
    use Queueable, SerializesModels;
    public $element;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.quotation');
    }
}
