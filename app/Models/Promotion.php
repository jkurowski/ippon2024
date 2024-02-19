<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Promotion extends Model
{
    use HasTranslations;
    public array $translatable = ['name', 'description', 'text', 'discount'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'discount',
        'description',
        'text',
        'active',
        'position',
        'file'
    ];

}
