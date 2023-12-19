<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Section extends Model
{

    protected static $logName = 'Sekcje strony';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_id',
        'title',
        'content',
        'file',
        'sort'
    ];
}
