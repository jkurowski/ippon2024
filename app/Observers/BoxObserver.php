<?php

namespace App\Observers;

// CMS
use App\Models\Boxes;
use App\Services\BoxService;

class BoxObserver
{
    /* Po usunieciu boksu kasujemy obrazek razem z kopia WebP — jedno miejsce
       z lista plikow (BoxService), zeby przy kolejnym formacie nie zostawaly sieroty. */
    public function deleted(Boxes $boxes)
    {
        app(BoxService::class)->deleteFiles($boxes);
    }
}
