<?php namespace App\Repositories;

use App\Models\Commercial;

class CommercialRepository extends BaseRepository
{
    protected $model;

    public function __construct(Commercial $model)
    {
        parent::__construct($model);
    }
}
