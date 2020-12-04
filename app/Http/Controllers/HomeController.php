<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs as ContactUsMail;
use App\Models\ContactUs;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::ads()->parents()->get();
    	// $categories = Category::ads()->parents()->take(6)->get();
    	// $featureds = Category::ads()->parents()->take(10)->get();
        return view("frontend.home", compact('categories'));
    }
    
    public function about_us()
    {
        return view('frontend.about_us');
    }

    public function contact_us()
    {
        return view('frontend.contact_us');
    }

    public function form_submit(Request $request) 
    {
    	$request->validate([
    		'fullname' => 'required',
    		'email' => 'required|email',
    		'subject' => 'required',
    		'message' => 'required',
    	]);

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        ContactUs::create($data);
    	Mail::to('info@th3rdplatoon.com')->send(new ContactUsMail($data));
        return redirect()->route('contact_us')->withMsg(['type' => 'success', 'text' => 'Your contact form submitted successfully!']);
    }

    public function categories()
    {
    	$categories = Category::ads()->parents()->get();
        return view("frontend.categories", compact('categories'));
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
