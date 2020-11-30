<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;

class JobsController extends Controller
{
    public function index() 
    {
        $categories = JobCategory::get();
        return view('frontend.jobs.index', compact('categories'));
    }

    public function show($slug) 
    {
        return view('frontend.jobs.show');
    }
}
