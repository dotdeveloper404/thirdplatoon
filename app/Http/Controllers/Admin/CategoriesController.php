<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return Inertia::render('Categories/index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();

        Category::create($request->all());
        return redirect()->back()->with('message', 'Category Created Successfully');
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();

        if ($request->has('id')) {
            Category::find($request->input('id'))->update($request->all());
            return redirect()->back()->with('message', 'Category Updated Sucessfully');
        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Category::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
