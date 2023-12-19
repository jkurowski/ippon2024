<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Greylist extends Model
{

    protected static $logName = 'Greylist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'reason',
        'route'
    ];
}
