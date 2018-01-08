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
        $temps = $this->element->templates->pluck('url');
        foreach($temps as $k => $v) {
            $this->attach(asset('storage/uploads/files/'.$v));
        }
        return $this->subject($this->element->subject)->markdown('emails.quotation');

    }
}
