<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasTranslations;
    public array $translatable = ['title', 'content_entry', 'content', 'meta_title', 'meta_description'];
    protected static $logName = 'Blog';

    const IMG_WIDTH = 1110;
    const IMG_HEIGHT = 600;
    const THUMB_WIDTH = 350;
    const THUMB_HEIGHT = 189;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content_entry',
        'content',
        'file',
        'file_webp',
        'file_facebook',
        'file_alt',
        'meta_title',
        'meta_description',
        'status',
        'sort'
    ];
}
