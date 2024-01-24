<?php namespace App\Repositories;

use App\Models\InvestmentPage;

class InvestmentPageRepository extends BaseRepository
{
    protected $model;

    public function __construct(InvestmentPage $model)
    {
        parent::__construct($model);
    }
}
