<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

// CMS
use App\Repositories\JobRepository;
use App\Models\Job;
use App\Models\Page;

class CareerController extends Controller
{
    private JobRepository $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    function index()
    {
        $page = Page::find(2);
        $jobs = $this->repository->allSort('ASC');

        return view('front.career.index', [
            'page' => $page,
            'jobs' => $jobs
        ]);
    }
}
