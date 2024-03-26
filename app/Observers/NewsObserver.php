<?php

namespace App\Observers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

// CMS
use App\Models\News;

class NewsObserver
{
    /**
     * Handle the article "deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function deleted(News $news)
    {
        $file = public_path('uploads/news/' . $news->file);
        $file_thumb = public_path('uploads/news/thumbs/' . $news->file);

        if (File::isFile($file)) {
            File::delete($file);
        }
        if (File::isFile($file_thumb)) {
            File::delete($file_thumb);
        }
    }

    /**
     * Handle the article "saving" event.
     *
     * @param News $news
     * @return void
     */
    public function saving(News $news)
    {
        if(app()->getLocale() == 'pl') {
            $news->slug = Str::slug($news->title);
        }
    }
}
