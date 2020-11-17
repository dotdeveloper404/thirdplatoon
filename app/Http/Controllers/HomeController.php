<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view("frontend.home");
    }
    //
    public function about_us()
    {
        return view('frontend.about_us');
    }

    public function contact_us()
    {
        return view('frontend.contact_us');
    }


    public function blog()
    {
        return view('frontend.blog');
    }

    public function post_add()
    {
        return view('frontend.post_add');
    }

    public function adds_listing()
    {
        return view('frontend.adds_listing');
    }

    public function categories()
    {
        return view("frontend.categories");
    }

    public function terms()
    {
        return view("frontend.terms");
    }
    public function privacy()
    {
        return view("frontend.privacy");
    }
}
