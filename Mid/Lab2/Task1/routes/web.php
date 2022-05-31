<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/product/service', [ProductController::class, "service"])->name("service");
Route::get('/about-us', [HomeController::class, "aboutUs"])->name("aboutus");
Route::get('/contact-us', [HomeController::class, "contactUs"])->name("contactus");
Route::get('/our-team', [HomeController::class, "ourTeam"])->name("ourteam");
