<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class InvestmentPage extends Model
{
    use HasTranslations;
    public array $translatable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'cta_text',
        'cta_button'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_robots',
        'sort',
        'active',
        'contact_form',
        'cta_text',
        'cta_button',
        'cta_link'
    ];
}
