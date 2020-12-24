<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;

class JobsCategoryController extends Controller
{
    public function index(Request $request, $slug)
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

        $job_category = JobCategory::where('slug', $slug)->firstOrFail();
        $jobs = $job_category->jobs()->where(function($query) use ($request) {
            $query->where('valid_till', '>', date('Y-m-d H:i:s'));
            $query->where('status', 1);

            if($request->has('search')) {
                $query->where('designation', 'LIKE', '%%%'. $request->search . '%%%');
            }
        })->orderBy($order['sortBy'], $order['order'])->paginate(10);
        return view('frontend.jobs.category.index', compact('job_category', 'jobs', 'categories'));
    }
}
