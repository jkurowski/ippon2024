<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandFormRequest;
use App\Mail\LandSend;
use App\Models\Page;
use App\Models\Recipient;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Notifications\ContactNotification;

use App\Repositories\Client\ClientRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LandController extends Controller
{
    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('front.land.index', [
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'page' => Page::where('id', 13)->first()
        ]);
    }

    function form(LandFormRequest $request, Recipient $recipient)
    {

        $recipient->notify(new ContactNotification($request));
        $lastNotificationId = DB::table('notifications')->latest()->value('id');

        $client = $this->repository->createClient($request, $lastNotificationId);
        Mail::to(settings()->get("page_email"))->send(new LandSend($request, $client));

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
