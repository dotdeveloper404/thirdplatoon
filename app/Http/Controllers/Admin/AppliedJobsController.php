<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\JobUser;

class AppliedJobsController extends Controller
{
    public function index()
    {
    	$job_users = JobUser::where('user_id', auth()->user()->id)->paginate(10);
    	$job_users->load('job', 'user');
    	return Inertia::render("AppliedJobs/index", compact('job_users'));
    }
}
