<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasTranslations;
    public array $translatable = ['content'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author',
        'rating',
        'type',
        'content'
    ];
}