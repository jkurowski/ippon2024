<?php

namespace App\Observers;

use Illuminate\Support\Str;

// CMS
use App\Models\Rent;

class RentObserver
{

    /**
     * Handle the "saving" event.
     *
     * @param Rent $model
     * @return void
     */
    public function saving(Rent $model)
    {
        if(app()->getLocale() == 'pl') {
            $model->slug = Str::slug($model->name);
        }
    }
}
