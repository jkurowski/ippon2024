<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Floor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'building_id',
        'name',
        'number',
        'position',
        'type',
        'area_range',
        'html',
        'cords',
        'file',
        'file_webp',
        'meta_title',
        'meta_description',
        'active'
    ];

    public function properties()
    {
        return $this->hasMany('App\Models\Property');
    }

    public function findNext(int $investment, int $building = null, int $position)
    {
        $query = $this->where('investment_id', $investment)->where('position', '>', $position)->orderBy('position');

        if ($building) {
            $query->where('building_id', $building);
        }

        return $query->first();
    }

    public function findPrev(int $investment, int $building = null, int $position)
    {
        $query = $this->where('investment_id', $investment)->where('position', '<', $position)->orderByDesc('position');

        if ($building) {
            $query->where('building_id', $building);
        }

        return $query->first();
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($floor) {
            if ($floor->file) {
                $image_path = public_path('investment/floor/' . $floor->file);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        });
    }
}
