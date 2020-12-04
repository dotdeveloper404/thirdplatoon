<?php

use App\Http\Controllers\Admin\AdsController as AdminAdsController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserAdController;
use App\Http\Controllers\JobsController;
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

Route::get('artisan', function () {
    return \Artisan::call('storage:link');
});

// BACKEND
Route::get('admin/ads/{id}/contact', [AdminAdsController::class, 'contact'], ['as' => 'admin'])->name('admin.ads.contact');
Route::resource('admin/ads', AdminAdsController::class, ['as' => 'admin']);
Route::post('admin/blog/{id}/status', [AdminBlogController::class, 'status'])->name('admin.blog.status');
Route::resource('admin/blog', AdminBlogController::class, ['as' => 'admin']);
Route::resource('admin/categories', CategoriesController::class, ['as' => 'admin']);

// FRONTEND

Route::post('ads/{id}/contact/', [AdsController::class, 'contact'])->name('ads.contact');

Route::resource('ads', AdsController::class);
Route::resource('blog', BlogController::class)->only(['index', 'show']);

Route::resource('jobs', JobsController::class)->only(['index', 'show']);



Route::get("/about-us", [HomeController::class, "about_us"])->name('about_us');
Route::get("/contact-us", [HomeController::class, "contact_us"])->name('contact_us');
Route::post("/contact-us", [HomeController::class, "form_submit"])->name('form_submit');
Route::get("/categories", [HomeController::class, "categories"])->name('categories');
Route::get("/terms", [HomeController::class, "terms"])->name('terms');
Route::get("/privacy", [HomeController::class, "privacy"])->name('privacy');
Route::get("/", [HomeController::class, "index"])->name('home');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
