<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

use App\Models\Page;
use App\Models\RodoSettings;
use Illuminate\Support\Facades\Mail;

use App\Mail\MailSend;

use App\Models\Property;
use App\Models\Recipient;
use App\Models\RodoRules;

use App\Notifications\ContactNotification;
use App\Notifications\PropertyNotification;

class ContactController extends Controller
{
    function index()
    {
        $page = Page::where('id', 1)->first();

        return view('front.contact.index', [
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'page' => $page
        ]);
    }

    function property(ContactFormRequest $request, $id)
    {
        if(!$request->get('form_surname')) {
            Property::find($id)->notify(new PropertyNotification($request));
            Mail::to(settings()->get("page_email"))->send(new MailSend($request));
            (new \App\Models\RodoClient)->saveOrCreate($request);
        }
        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }

    function send(ContactFormRequest $request, Recipient $recipient)
    {
        if(!$request->get('form_surname')) {
            $recipient->notify(new ContactNotification($request));
            Mail::to(settings()->get("page_email"))->send(new MailSend($request));
            (new \App\Models\RodoClient)->saveOrCreate($request);
        }
        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }
}
