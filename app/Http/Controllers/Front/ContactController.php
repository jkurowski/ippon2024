<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

use App\Mail\ChatSend;
use App\Models\Investment;
use App\Models\Page;
use App\Models\RodoSettings;
use App\Repositories\Client\ClientRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\MailSend;
use http\Cookie;

use App\Models\Property;
use App\Models\Recipient;
use App\Models\RodoRules;

use App\Notifications\ContactNotification;
use App\Notifications\PropertyNotification;

class ContactController extends Controller
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    function index()
    {
        $page = Page::where('id', 1)->first();

        return view('front.contact.index', [
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'page' => $page
        ]);
    }

    function property(ContactFormRequest $request, $lang, $slug, $id)
    {

        try {
            $property = Property::find($id);

            if (!$property) {
                return redirect()->back()->with('error', 'Nie znaleziono lokalu z tym numerem.');
            }

            $client = $this->repository->createClient($request, $property);
            $property->notify(new PropertyNotification($request, $property));
            Mail::to(settings()->get("page_email"))->send(new ChatSend($request, $client, $property));

//            if( count(Mail::failures()) == 0 ) {
//                $cookie_name = 'dp_';
//                foreach ($_COOKIE as $name => $value) {
//                    if (stripos($name, $cookie_name) === 0) {
//                        Cookie::queue(
//                            Cookie::forget($name)
//                        );
//                    }
//                }
//            }
        } catch (\Throwable $exception) {
            dd($exception);
        }

        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }

    function contact(ContactFormRequest $request, Recipient $recipient)
    {
        $recipient->notify(new ContactNotification($request));
        $lastNotificationId = DB::table('notifications')->latest()->value('id');

        $client = $this->repository->createClient($request, $lastNotificationId);
        Mail::to(settings()->get("page_email"))->send(new ChatSend($request, $client));

//        if( count(Mail::failures()) == 0 ) {
//            $cookie_name = 'dp_';
//            foreach ($_COOKIE as $name => $value) {
//                if (stripos($name, $cookie_name) === 0) {
//                    Cookie::queue(
//                        Cookie::forget($name)
//                    );
//                }
//            }
//        }

        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana.'
        );
    }
}
