<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function list()
    {
        return view('course.list')
            ->with('courses', Course::all());
    }

    public function create()
    {
        return view('course.create')
            ->with('departments', Department::all());
    }

    public function createSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|regex:/[\w\s\.\_\-]+/',
                'department' => 'required|numeric'
            ],
            [
                'name.regex' => 'Name must be alpha, dot, dash, underscore and space'
            ]
        );

        $course = new Course();
        $course->name = $request->name;
        $course->d_id = $request->department;
        $course->save();

        session()->flash('message', 'Successfully registered');

        return back();
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:courses,c_id"
        ]);

        return view('course.edit')
            ->with('course', Course::where('c_id', $request->id)->first())
            ->with('departments', Department::all());
    }

    public function editSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:courses,c_id"
        ]);

        $course = Course::where('c_id', '=', $request->id)->first();
        $course->name = $request->name;
        $course->d_id = $request->department;
        $course->update();

        session()->flash('message', 'Successfully updated');

        return back();
    }

    public function delete(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:courses,c_id"
        ]);

        return view('course.delete')
            ->with('course', Course::where('c_id', $request->id)->first());
    }

    public function deleteSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:courses,c_id"
        ]);

        $course = Course::where('c_id', '=', $request->id)->first();
        $course->delete();

        session()->flash('message', 'Successfully deleted');

        return redirect()->route('course.list');
    }
}
