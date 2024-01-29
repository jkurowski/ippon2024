<?php namespace App\Repositories;

use App\Models\News;

class NewsRepository extends BaseRepository
{
    protected $model;

    public function __construct(News $model)
    {
        parent::__construct($model);
    }
}
