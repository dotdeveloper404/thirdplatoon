<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});

Route::get("/about-us", [HomeController::class, "about_us"]);
Route::get("/contact-us", [HomeController::class, "contact_us"]);
Route::get("/post-add", [HomeController::class, "post_add"]);
Route::get("/categories", [HomeController::class, "categories"]);
Route::get("/adds-listing", [HomeController::class, "adds_listing"]);
Route::get("/blog", [HomeController::class, "blog"]);
Route::get("/terms", [HomeController::class, "terms"]);
Route::get("/privacy", [HomeController::class, "privacy"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
