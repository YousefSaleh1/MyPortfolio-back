<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $client;

    /**
     * Create a new message instance.
     */
    public function __construct($content, $client)
    {
        $this->content = $content;
        $this->client = $client;
    }

    public function build()
    {
        return $this->subject($this->client .'contacted you in the portfolio')
                    ->view('emails.send_contact')
                    ->with(['content' => $this->content]);
    }

}
