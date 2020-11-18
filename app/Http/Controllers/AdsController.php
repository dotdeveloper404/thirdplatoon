<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ads;
use Auth;

class AdsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $ads = Ads::where(function($query) use ($request) {
                if ($request->has('category')) {
                    $query->where('category_id', $request->category);
                }  
                $query->orWhere('title', 'LIKE', '%%'.$request->search.'%%')->orWhere('description', 'LIKE', '%%'.$request->search.'%%');
            })->latest('id')->paginate(10);
        } else {
            $ads = Ads::latest('id')->paginate(10);
        }
        $categories = Category::ads()->get();
        return view('frontend.ads.index', compact('ads', 'categories'));
    }

    public function create()
    {
        $categories = Category::ads()->get();
        return view('frontend.ads.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/ads', $filename);
        }

        Ads::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $filename
        ]);

        return redirect()->route('ads.create')->withMsg(['type' => 'success', 'text' => 'Ad created successfully!']);
    }

    public function show($slug)
    {
        return view('frontend.ads.show');
    }

    public function edit($id)
    {
        return view('frontend.ads.edit');
    }

    public function update(Request $request, $id)
    {
        dd($id);
    }

    public function destroy($id)
    {
        dd($id);
    }
}
