<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Ads;

class UserAdController extends Controller
{

    public function index()
    {
        $data = Ads::all();
        return Inertia::render('user_ad', ['data' => $data]);
    }
}
