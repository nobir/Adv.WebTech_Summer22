<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(NewsController::class)
    ->prefix('news')
    ->group(function () {
        Route::get('/list', 'viewNews')->name('news.viewNews');

        // Route::get('/create', 'createNews')->name('news.createNews');
        Route::post('/create', 'createNewsSubmit')->name('news.createNewsSubmit');

        Route::get('/edit/{id}', 'editNews')->name('news.editNews')->whereNumber('id');
        Route::post('/edit/{id}', 'editNewsSubmit')->name('news.editNewsSubmit')->whereNumber('id');

        Route::get('/delete/{id}', 'deleteNews')->name('news.deleteNews')->whereNumber('id');

        Route::get('/type/{type}/list', 'getNewsByType')->name('news.getNewsByType')->whereAlpha('type');
        Route::get('/date/{date}/list', 'getNewsByDate')->name('news.getNewsByDate');
        Route::get('/type-date/{type}/{date}/list', 'getNewsByTypeDate')->name('news.getNewsByTypeDate')->whereAlpha('type');
    });
