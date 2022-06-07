<?php

use App\Http\Controllers\UserController;
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


Route::controller(UserController::class)
    ->group(function () {
        Route::get('/', "index")
            ->name("user.index");

        Route::get('/registration', "registration")
            ->name("user.registration");

        Route::get('/show', "show")
            ->name('user.show');

        Route::get('/user/{id}', "single")
            ->name('user.single')
            ->where(['id' => '[0-9]+']);

        Route::post('/registration', "registrationSubmit")
            ->name("user.registrationSubmit");
    });
