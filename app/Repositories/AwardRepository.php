<?php namespace App\Repositories;

use App\Models\Award;

class AwardRepository extends BaseRepository
{
    protected $model;

    public function __construct(Award $model)
    {
        parent::__construct($model);
    }
}
