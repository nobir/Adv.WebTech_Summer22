<?php

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

Route::get('/', [ProductController::class, "home"])->name("product.home");
Route::get('/product/create', [ProductController::class, "create"])->name("product.create");
Route::post('/product/create', [ProductController::class, "createSubmit"])->name("product.createSubmit");
Route::get('/product/', [ProductController::class, "all"])->name("product.all");
Route::get('/product/{id}', [ProductController::class, "single"])->name("product.single");
