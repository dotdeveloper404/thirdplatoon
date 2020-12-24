<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobUser;
use Auth;

class JobsController extends Controller
{
    public function index(Request $request) 
    {
        $categories = JobCategory::get();

        $order = [
            'sortBy' => 'id',
            'order' => 'DESC'
        ];

        if($request->has('orderby') && $request->orderby != '') {
            if($request->orderby == "newest") {
                $order = [
                    'sortBy' => 'id',
                    'order' => 'DESC'
                ];
            }

            if($request->orderby == "oldest") {
                $order = [
                    'sortBy' => 'id',
                    'order' => 'ASC'
                ];
            }
        }

        $jobs = Job::where(function($query) use ($request) {
            $query->where('valid_till', '>', date('Y-m-d H:i:s'));
            $query->where('status', 1);

            if($request->has('search')) {
                $query->where('designation', 'LIKE', '%%%'. $request->search . '%%%');
            }
        })->orderBy($order['sortBy'], $order['order'])->paginate(10);
        
        return view('frontend.jobs.index', compact('jobs', 'categories'));
    }

    public function show($category_slug, $job_id) 
    {
        $category = JobCategory::where('slug', $category_slug)->firstOrFail();
        $job = $category->jobs()->where('id', $job_id)->firstOrFail();
        $job->load('category', 'job_users');
        return view('frontend.jobs.show', compact('job'));
    }

    public function apply($category_slug, $job_id)
    {
        $category = JobCategory::where('slug', $category_slug)->firstOrFail();
        $job = $category->jobs()->where('id', $job_id)->firstOrFail();
        $job->load('category', 'job_users');
        if (!$job->job_user) {
            return view('frontend.jobs.apply', compact('job'));
        }

        abort(404);
    }

    public function save_apply(Request $request, $category_slug, $job_id) 
    {
        $category = JobCategory::where('slug', $category_slug)->firstOrFail();
        $job = $category->jobs()->where('id', $job_id)->firstOrFail();

        $request->validate([
            'attachment' => 'required|mimes:doc,docx,pdf'
        ]);

        $filename = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/apply_job', $filename);
        }

        JobUser::create([
            'user_id' => auth()->user()->id,
            'job_id' => $job->id,
            'attachment' => $filename,
            'comments' => $request->comments
        ]);

        return redirect()->route('jobs.show', [$category_slug, $job_id])->withMsg([
            'type' => 'success',
            'text' => 'You Applied Successfully!',
        ]);
    }
}
