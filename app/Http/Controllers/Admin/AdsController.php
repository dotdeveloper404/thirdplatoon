<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{Ads, Category, User};
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{

    public function index()
    {
        $data = Ads::with('category', 'user')->get();

        $categories = Category::where('category_type', 'ads')->get();
        $users = User::all();
        return Inertia::render('Ads/index', ['data' => $data, 'categories' => $categories, 'users' => $users]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['Required'],
            'category_id' => ['Required'],
            'price' => ['Required'],
        ])->validate();

        $filename = '';
        if ($request->hasFile('ad_image')) {
            $file = $request->file('ad_image');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/ads', $filename);
        }
        $request->merge(['image' => $filename]);

        Ads::create($request->except(['ad_image']));
        return redirect()->back()->with('message', 'Ad Created successfully');
    }

    public function update(Request $request)
    {


        Validator::make($request->all(), [
            'title' => ['Required'],
            'category_id' => ['Required'],
            'price' => ['Required'],
        ])->validate();

        $filename = '';
        if ($request->hasFile('ad_image')) {
            $file = $request->file('ad_image');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/ads', $filename);
        }
        $request->merge(['image' => $filename]);

        Ads::find($request->input('id'))->update($request->except('ad_image'));

        return redirect()->back()->with('message', 'Ad Updated Successfully');
    }
}
