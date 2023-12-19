<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class InvestmentArticles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'investments_articles';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'title',
        'date',
        'content'
    ];
}
