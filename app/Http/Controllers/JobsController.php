<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobsController extends Controller
{
    public function index() 
    {
        return view('frontend.jobs.index');
    }

    public function show($slug) 
    {
        return view('frontend.jobs.show');
    }
}
