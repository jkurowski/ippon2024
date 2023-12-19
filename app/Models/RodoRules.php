<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RodoRules extends Model
{
    protected static $logName = 'Regułki RODO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'text',
        'required',
        'time',
        'status',
        'sort'
    ];
}
