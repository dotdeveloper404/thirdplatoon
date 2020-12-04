<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\{Blog, Category};

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::with('category')->paginate(10);
        return Inertia::render("Blog/index", compact('posts'));
    }

    public function create()
    {
        $categories = Category::ads()->get();
        return Inertia::render("Blog/create", compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'max:500000'
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/blog', $filename);
        }

        Blog::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect()->route('admin.blog.index')->with('message', 'Post Created Sucessfully');
    }

    public function edit($id)
    {
        $categories = Category::ads()->get();
        $post = Blog::findOrFail($id);
        $post->load('category');
        return Inertia::render("Blog/edit", compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'max:500000'
        ]);

        $post = Blog::findOrFail($id);

        $filename = $post->image;
        if ($request->hasFile('image')) {
            if (Storage::exists('/public/blog/' . $filename)) {
                Storage::delete('/public/blog/' . $filename);
            }
            $file = $request->file('image');
            $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/blog', $filename);
        }

        $post->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect()->route('admin.blog.index')->with('message', 'Post Updated Sucessfully');
    }

    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        if (Storage::exists('/public/blog/' . $post->image)) {
            Storage::delete('/public/blog/' . $post->image);
        }
        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Sucessfully');
    }

    public function status($id)
    {
        $post = Blog::findOrFail($id);
        $post->update([
            'status' => $post->status ? 0 : 1
        ]);
        return redirect()->back()->with('message', 'Post Status Updated Sucessfully');
    }
}
