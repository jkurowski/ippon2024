<?php namespace App\Repositories;

use App\Models\Promotion;

class PromotionRepository extends BaseRepository
{
    protected $model;

    public function __construct(Promotion $model)
    {
        parent::__construct($model);
    }
}
