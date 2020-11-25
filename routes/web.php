<?php

use App\Http\Controllers\Admin\AdsController as AdminAdsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\BlogController as ControllersBlogController;
use App\Http\Controllers\UserAdController;
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

Route::resource('ads', AdsController::class);

// Route::resource('user-ad', UserAdController::class);

Route::resource('admin/ads', AdminAdsController::class, ['as' => 'admin']);
Route::resource('admin/blog', BlogController::class, ['as' => 'admin']);
Route::resource('admin/categories', CategoriesController::class, ['as' => 'admin']);

Route::resource('blog', ControllersBlogController::class);

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
