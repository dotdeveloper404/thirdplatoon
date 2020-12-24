<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\JobCategory;

class JobsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs_categories = JobCategory::paginate(10);
        $jobs_categories->load('jobs');
        return Inertia::render("JobsCategories/index", compact('jobs_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("JobsCategories/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        JobCategory::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.jobs.categories.index')->with('message', 'Job Category Created Sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_category = JobCategory::findOrFail($id);
        return Inertia::render("JobsCategories/edit", compact('job_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $job_category = JobCategory::findOrFail($id);
        $job_category->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.jobs.categories.index')->with('message', 'Job Category Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job_category = JobCategory::findOrFail($id);
        $job_category->delete();
        return redirect()->route('admin.jobs.categories.index')->with('message', 'Job Category Deleted Sucessfully');
    }
}
