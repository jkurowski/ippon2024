<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Kafle "Inwestycje w sprzedazy" na stronie glownej (admin: Boksy).
 * Metraz (`area`) jest tylko po polsku — liczby i m2 sa takie same w obu jezykach.
 */
class Boxes extends Model
{
    use HasTranslations;

    public array $translatable = [
        'badge',
        'location',
        'name',
        'description',
        'handover',
        'advantage',
        'link_apartments',
        'link_description',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'badge',
        'location',
        'name',
        'description',
        'area',
        'handover',
        'advantage',
        'link_apartments',
        'link_description',
        'file',
        'file_webp',
        'sort'
    ];
}
