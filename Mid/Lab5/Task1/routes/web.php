<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;

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


Route::controller(MainController::class)->group(function () {
    Route::get('/', "index")->name("main.index");
    Route::get('/allList/{id}', "allListByDepartment")
        ->whereNumber('id')
        ->name("main.allListByDepartment");
});

Route::controller(DepartmentController::class)->prefix('department')->group(function () {
    Route::get('/list', 'list')->name('department.list');
    Route::get('/{id}/students', 'studentsByDepartment')
        ->whereNumber('id')
        ->name('department.studentsByDepartment');
    Route::get('/{id}/courses', 'coursesByDepartment')
        ->whereNumber('id')
        ->name('department.coursesByDepartment');
    Route::get('/{id}/teachers', 'teachersByDepartment')
        ->whereNumber('id')
        ->name('department.teachersByDepartment');

    Route::get('/create', 'create')->name('department.create');
    Route::post('/create', 'createSubmit')->name('department.createSubmit');

    Route::get('/edit/{id}', 'edit')->name('department.edit');
    Route::post('/edit/{id}', 'editSubmit')->name('department.editSubmit');

    Route::get('/delete/{id}', 'delete')->name('department.delete');
    Route::post('/delete/{id}', 'deleteSubmit')->name('department.deleteSubmit');
});

Route::controller(StudentController::class)->prefix('student')->group(function () {
    Route::get('/list', 'list')->name('student.list');

    Route::get('/create', 'create')->name('student.create');
    Route::post('/create', 'createSubmit')->name('student.createSubmit');

    Route::get('/edit/{id}', 'edit')
        ->whereNumber('id')
        ->name('student.edit');
    Route::post('/edit/{id}', 'editSubmit')
        ->whereNumber('id')
        ->name('student.editSubmit');

    Route::get('/delete/{id}', 'delete')
        ->whereNumber('id')
        ->name('student.delete');
    Route::post('/delete/{id}', 'deleteSubmit')
        ->whereNumber('id')
        ->name('student.deleteSubmit');
});

Route::controller(CourseController::class)->prefix('course')->group(function () {
    Route::get('/list', 'list')->name('course.list');

    Route::get('/create', 'create')->name('course.create');
    Route::post('/create', 'createSubmit')->name('course.createSubmit');

    Route::get('/edit/{id}', 'edit')
        ->whereNumber('id')
        ->name('course.edit');
    Route::post('/edit/{id}', 'editSubmit')
        ->whereNumber('id')
        ->name('course.editSubmit');

    Route::get('/delete/{id}', 'delete')
        ->whereNumber('id')
        ->name('course.delete');
    Route::post('/delete/{id}', 'deleteSubmit')
        ->whereNumber('id')
        ->name('course.deleteSubmit');
});

Route::controller(TeacherController::class)->prefix('teacher')->group(function () {
    Route::get('/list', 'list')->name('teacher.list');

    Route::get('/create', 'create')->name('teacher.create');
    Route::post('/create', 'createSubmit')->name('teacher.createSubmit');

    Route::get('/edit/{id}', 'edit')
        ->whereNumber('id')
        ->name('teacher.edit');
    Route::post('/edit/{id}', 'editSubmit')
        ->whereNumber('id')
        ->name('teacher.editSubmit');

    Route::get('/delete/{id}', 'delete')
        ->whereNumber('id')
        ->name('teacher.delete');
    Route::post('/delete/{id}', 'deleteSubmit')
        ->whereNumber('id')
        ->name('teacher.deleteSubmit');
});
