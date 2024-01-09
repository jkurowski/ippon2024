<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Commercial extends Model
{
    use HasTranslations;
    public array $translatable = ['name', 'text'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'text',
        'gallery_id',
        'sort'
    ];
}
