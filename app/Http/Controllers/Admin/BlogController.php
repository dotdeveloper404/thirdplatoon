<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\{Blog};

class BlogController extends Controller
{

    public function index()
    {
        $data = Blog::all();
        return Inertia::render("/Blog   /Index", ['data' => $data]);
    }
}
