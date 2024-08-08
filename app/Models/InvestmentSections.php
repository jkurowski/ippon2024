<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class InvestmentSections extends Model
{
    use HasTranslations;
    public array $translatable = [
        'title',
        'subtitle',
        'text',
        'link',
        'link_button'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'category',
        'title',
        'subtitle',
        'text',
        'link',
        'link_button',
        'file',
        'file_webp',
        'active',
        'position'
    ];
}











