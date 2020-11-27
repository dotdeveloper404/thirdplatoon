<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::where('status', 1)->latest('id')->paginate(10);
        return view('frontend.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Blog::whereSlug($slug)->first();
        return view('frontend.blog.show', compact('post'));
    }
}
