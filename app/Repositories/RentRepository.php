<?php namespace App\Repositories;

use App\Models\Rent;

class RentRepository extends BaseRepository
{
    protected $model;

    public function __construct(Rent $model)
    {
        parent::__construct($model);
    }
}
