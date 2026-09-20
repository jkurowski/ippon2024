<?php

namespace App\Observers;

use Illuminate\Support\Str;

// CMS
use App\Models\Url;

class UrlObserver
{
    /**
     * Handle the article "saving" event.
     *
     * @param Url $url
     * @return void
     */
    public function saving(Url $url)
    {
        $url->type = 2;

        /* Slug i uri wylacznie z polskiego tytulu — jak w pozostalych
           obserwatorach. Bez tego zapis pozycji menu przy `?lang=en`
           (kontroler ustawia wtedy locale) przepisywal adres z angielskiego
           tytulu: "kontakt" robilo sie "contact". */
        if (app()->getLocale() != 'pl') {
            return;
        }

        $url->slug = Str::slug($url->title);

        if ($url->parent_id) {
            $array = Url::ancestorsOf($url->id)->pluck('slug')->toArray();
            array_push($array, $url->slug);
            $url->uri = implode('/', $array);
        } else {
            $url->uri = $url->slug;
        }
    }
}
