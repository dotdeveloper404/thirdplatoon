<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{AdContact, Ads, AdUser, Category, User};
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{

    public function index()
    {
        $data = Ads::where(function($query){
            if(auth()->user()->user_type == 'customer') {
                $query->where('user_id' , auth()->user()->id);
            }
        })->with('category', 'user')->get();

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

        if(auth()->user()->user_type == 'customer') {
            $request->merge(['user_id' => auth()->user()->id]);
        }

        Ads::create($request->except(['ad_image']));
        return redirect()->back()->with('message', 'Ad Created successfully');
    }

    public function contact($id)
    {
        $ad = AdUser::where('ad_id', $id)->get();
        return Inertia::render('Ads/contact', ['data' => $ad]);
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

        Ads::find($request->input('id'))->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect()->back()->with('message', 'Ad Updated Successfully');
    }
}
