<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Property extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'building_id',
        'floor_id',
        'status',
        'name',
        'name_list',
        'number',
        'number_order',
        'rooms',
        'area',
        'price',
        'garden_area',
        'balcony_area',
        'balcony_area_2',
        'terrace_area',
        'terrace_area_2',
        'loggia_area',
        'parking_space',
        'garage',
        'type',
        'highlighted',
        'homepage',
        'html',
        'cords',
        'file',
        'file_pdf',
        'file_webp',
        'meta_title',
        'meta_description'
    ];

    public function findNext(int $investment, int $id)
    {
        return $this->where('investment_id', $investment)->where('id', '>', $id)->first();
    }

    public function findPrev(int $investment, int $id)
    {
        return $this->where('investment_id', $investment)->where('id', '<', $id)->first();
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($property) {
            if ($property->file) {
                $image_path = public_path('investment/property/' . $property->file);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $image_thumb_path = public_path('investment/property/thumbs/' . $property->file);
                if (file_exists($image_thumb_path)) {
                    unlink($image_thumb_path);
                }
                $image_list_path = public_path('investment/property/list/' . $property->file);
                if (file_exists($image_list_path)) {
                    unlink($image_list_path);
                }
            }
        });
    }
}
