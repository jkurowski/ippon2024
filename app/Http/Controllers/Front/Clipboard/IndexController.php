<?php

namespace App\Http\Controllers\Front\Clipboard;

use App\Http\Controllers\Controller;

use App\Mail\ClipboardSend;
use App\Models\RodoSettings;
use App\Notifications\ContactNotification;
use App\Services\Front\ClipboardService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

// CMS
use App\Repositories\Client\ClientRepository;
use App\Http\Requests\ClipboardFormRequest;
use App\Models\Page;
use App\Models\Recipient;
use App\Models\RodoRules;

/**
 * Schowek — porownywarka lokali odlozonych przez odwiedzajacego.
 *
 * Zawartosc trzyma ClipboardService (sesja, nic w bazie). Kontroler nie
 * dotyka juz sesji recznie: wczesniej ta sama logika ("wez id, zamien na
 * int, pociagnij Property") stala w trzech metodach, za kazdym razem bez
 * eager loadingu.
 *
 * Kontrakt AJAX-a zostaje bez zmian — przycisk "dodaj do schowka" na karcie
 * lokalu czyta z odpowiedzi `message` (gotowy HTML) i `count`, i reaguje
 * tylko na status 200. Dlatego komunikat o pelnym schowku tez idzie z 200.
 */
class IndexController extends Controller
{
    public function __construct(
        private ClientRepository $repository,
        private ClipboardService $clipboard,
    ) {
    }

    public function index()
    {
        return view('front.clipboard.index', [
            'page' => Page::find(19),
            'properties' => $this->clipboard->properties(),
            'clipboard' => $this->clipboard,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
        ]);
    }

    public function send(ClipboardFormRequest $request, Recipient $recipient)
    {
        $recipient->notify(new ContactNotification($request));

        Mail::to(settings()->get("page_email"))
            ->send(new ClipboardSend($request, $this->clipboard->properties()));

        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana.'
        );
    }

    public function store(Request $request)
    {
        $id = (int) $request->get('id');
        $added = $this->clipboard->add($id);

        return response()->json([
            'message' => $added
                ? '<div class="alert alert-success border-0 mt-3">Mieszkanie dodane do schowka</div>'
                : '<div class="alert alert-warning border-0 mt-3">W schowku mieści się najwyżej '
                    . ClipboardService::LIMIT . ' mieszkań — usuń jedno, żeby dodać kolejne</div>',
            'count' => $this->clipboard->count(),
            'added' => $added,
        ]);
    }

    public function destroy(Request $request)
    {
        $id = (int) $request->input('id');

        if (!$this->clipboard->has($id)) {
            return response()->json([
                'message' => '<div class="alert alert-danger border-0 mt-3">Wybrane mieszkanie nie istnieje w schowku</div>',
                'count' => $this->clipboard->count(),
            ]);
        }

        $this->clipboard->remove($id);

        return response()->json([
            'message' => '<div class="alert alert-success border-0 mt-3">Mieszkanie usunięte ze schowka</div>',
            'count' => $this->clipboard->count(),
        ]);
    }
}
