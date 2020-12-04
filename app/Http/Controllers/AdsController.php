<?php

namespace App\Http\Controllers;

use App\Models\AdContact;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ads;
use App\Models\AdUser;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store']]);
    }
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $ads = Ads::where(function ($query) use ($request) {
                if ($request->has('category') && $request->category != '') {
                    $query->where('category_id', $request->category);
                }

                if ($request->has('min_price') && $request->min_price != '') {
                    $query->where('price', '>=', $request->min_price);
                }

                if ($request->has('max_price') && $request->max_price != '') {
                    $query->where('price', '<=', $request->max_price);
                }

                if ($request->search != '') {
                    $query->where('title', 'LIKE', '%%' . $request->search . '%%')->orWhere('description', 'LIKE', '%%' . $request->search . '%%');
                }
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
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/ads', $filename);
        }

        Ads::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect()->route('ads.create')->withMsg(['type' => 'success', 'text' => 'Ad created successfully!']);
    }

    public function show($slug)
    {
        $ad = Ads::where('slug', $slug)->firstOrFail();
        return view('frontend.ads.show', compact('ad'));
    }

    public function edit($id)
    {
        return view('frontend.ads.edit');
    }

    public function contact(Request $request, $id)
    {
        AdUser::create([
            'ad_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description
        ]);
        return redirect()->route('ads.index')->withMsg(['type' => 'success', 'text' => 'Request Send To User Successfully']);
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
