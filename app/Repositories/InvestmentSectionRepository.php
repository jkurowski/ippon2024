<?php namespace App\Repositories;

use App\Models\InvestmentSections;

class InvestmentSectionRepository extends BaseRepository
{
    protected $model;

    public function __construct(InvestmentSections $model)
    {
        parent::__construct($model);
    }
}
