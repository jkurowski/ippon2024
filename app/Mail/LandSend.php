<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

// CMS
use App\Models\Client;

class LandSend extends Mailable
{
    use Queueable, SerializesModels;
    private $request;
    private Client $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, Client $client)
    {
        $this->request = $request;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('DeveloPro - masz nową wiadomość')->view('front.land.mail-template',
            [
                'request' => $this->request,
                'client' => $this->client
            ]);
    }
}
