<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\{Job, JobCategory, JobUser};

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::where(function($query){
            if(auth()->user()->user_type == 'customer') {
                $query->where('user_id', auth()->user()->id);
            }
        })->with('category', 'job_users')->paginate(10);
        return Inertia::render("Jobs/index", compact('jobs'));
    }

    public function create()
    {
        $currencies = currencies();
        $categories = JobCategory::get();
        return Inertia::render("Jobs/create", compact('categories', 'currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'company_name' => 'required',
            'company_logo' => 'required|max:500000',
            'location' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'job_type' => 'required',
            'shift' => 'required',
            'experience' => 'required',
            'qualification' => 'required',
            'currency' => 'required',
            'pay_start' => 'required',
            'pay_end' => 'required',
            'pay_type' => 'required',
            'description' => 'required',
            'allownces' => 'required',
            'requirements' => 'required',
            'valid_till' => 'required',
            'job_status' => 'required'
        ]);

        $filename = null;
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/jobs', $filename);
        }

        Job::create([
            "user_id" => auth()->user()->id,
            "category_id" => $request->category,
            "company_name" => $request->company_name,
            "company_logo" => $filename,
            "location" => $request->location,
            "country" => $request->country,
            "phone_number" => $request->phone_number,
            "email" => $request->email,
            "designation" => $request->designation,
            "job_type" => $request->job_type,
            "shift" => $request->shift,
            "experience" => $request->experience,
            "qualification" => $request->qualification,
            "currency" => $request->currency,
            "pay_start" => $request->pay_start,
            "pay_end" => $request->pay_end,
            "pay_type" => $request->pay_type,
            "description" => $request->description,
            "allownces" => $request->allownces,
            "requirements" => $request->requirements,
            "valid_till" => $request->valid_till,
            "job_status" => $request->job_status,
            "urgent" => ($request->urgent == "true") ? 1 : 0,
            "featured" => ($request->featured == "true") ? 1 : 0
        ]);

        return redirect()->route('admin.jobs.index')->with('message', 'Job Created Sucessfully');

    }
    
    public function show($id)
    {
        $job = Job::findOrFail($id);
        $job->load('category');
        return Inertia::render("Jobs/show", compact('job'));
    }

    public function edit($id)
    {
        $currencies = currencies();
        $categories = JobCategory::get();
        $job = Job::findOrFail($id);
        $job->load('category');
        return Inertia::render("Jobs/edit", compact('job', 'categories', 'currencies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'company_name' => 'required',
            'company_logo' => 'max:500000',
            'location' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'job_type' => 'required',
            'shift' => 'required',
            'experience' => 'required',
            'qualification' => 'required',
            'currency' => 'required',
            'pay_start' => 'required',
            'pay_end' => 'required',
            'pay_type' => 'required',
            'description' => 'required',
            'allownces' => 'required',
            'requirements' => 'required',
            'valid_till' => 'required',
            'job_status' => 'required'
        ]);

        $job = Job::findOrFail($id);

        $filename = $job->company_logo;
        if ($request->hasFile('company_logo')) {
            if (Storage::exists('/public/jobs/' . $filename)) {
                Storage::delete('/public/jobs/' . $filename);
            }
            $file = $request->file('company_logo');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/jobs', $filename);
        }

        $job->update([
            "category_id" => $request->category,
            "company_name" => $request->company_name,
            "company_logo" => $filename,
            "location" => $request->location,
            "country" => $request->country,
            "phone_number" => $request->phone_number,
            "email" => $request->email,
            "designation" => $request->designation,
            "job_type" => $request->job_type,
            "shift" => $request->shift,
            "experience" => $request->experience,
            "qualification" => $request->qualification,
            "currency" => $request->currency,
            "pay_start" => $request->pay_start,
            "pay_end" => $request->pay_end,
            "pay_type" => $request->pay_type,
            "description" => $request->description,
            "allownces" => $request->allownces,
            "requirements" => $request->requirements,
            "valid_till" => $request->valid_till,
            "job_status" => $request->job_status,
            "urgent" => ($request->urgent == "true") ? 1 : 0,
            "featured" => ($request->featured == "true") ? 1 : 0
        ]);

        return redirect()->route('admin.jobs.index')->with('message', 'Job Updated Sucessfully');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        if (Storage::exists('/public/jobs/' . $job->company_logo)) {
            Storage::delete('/public/jobs/' . $job->company_logo);
        }
        $job->delete();
        return redirect()->back()->with('message', 'Job Deleted Sucessfully');
    }

    public function status($id)
    {
        $job = Job::findOrFail($id);
        $job->update([
            'status' => $job->status ? 0 : 1
        ]);
        return redirect()->back()->with('message', 'Job Status Updated Sucessfully');
    }

    public function applied($id)
    {
        $job = Job::findOrFail($id);
        $job->load('category', 'job_users');
        $csrf = csrf_token();
        return Inertia::render("Jobs/applied", compact('job', 'csrf'));
    }

    public function applied_status(Request $request, $job_id, $user_id)
    {
        $job_user = JobUser::findOrFail($user_id);
        $job_user->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('message', 'Status Updated Sucessfully');
    }
}
