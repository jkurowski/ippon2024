<?php

namespace App\Observers;

// CMS
use App\Models\InvestmentPage;
use Illuminate\Support\Str;

class InvestmentPageObserver
{

    /**
     * Handle the investment "saving" event.
     *
     * @param InvestmentPage $page
     * @return void
     */
    public function saving(InvestmentPage $page)
    {
        if(app()->getLocale() == 'pl') {
            $page->slug = Str::slug($page->title);
        }
    }
}
