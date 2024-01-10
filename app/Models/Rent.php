<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Rent extends Model
{
    use HasTranslations;
    public array $translatable = ['name', 'meta_title', 'meta_description', 'text'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'active',
        'area',
        'meta_title',
        'meta_description',
        'meta_robots',
        'file',
        'text',
        'sort'
    ];
}
