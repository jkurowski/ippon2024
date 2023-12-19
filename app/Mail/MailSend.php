<?php

namespace App\Mail;

use App\Models\RodoRules;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;

    private $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $checkboxes = preg_grep("/rule_([0-9])/i", array_keys($this->request->all()));

        $rodo_rules = [];

        foreach($checkboxes as $rule) {
            $getId = preg_replace('/[^0-9]/', '', $rule);
            $rodo = RodoRules::where('id', $getId)->first();
            $rodo_rules[] = $rodo->text;
        }

        return $this->subject(config('app.name').' - wiadomość wysłana z: '.$this->request->form_page)->view('front.mail.form', ['request' => $this->request, 'rodo_rules' => $rodo_rules]);
    }
}
