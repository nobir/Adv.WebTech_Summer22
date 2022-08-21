<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\CourseTeacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function list()
    {
        return view('teacher.list')
            ->with('teachers', Teacher::all());
    }

    public function create()
    {
        return view('teacher.create')
            ->with('departments', Department::all())
            ->with('courses', Course::all());
    }

    public function createSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|regex:/[\w\s\.\_\-]+/',
                'department' => 'required|numeric',
                'courses' => 'required|array|max:3'
            ],
            [
                'name.regex' => 'Name must be alpha, dot, dash, underscore and space'
            ]
        );

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->d_id = $request->department;
        $teacher->save();

        foreach ($request->courses as $course) {
            $teacher->courses()->attach($course);
        }

        $teacher->save();

        session()->flash('message', 'Successfully registered');

        return back();
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:teachers,t_id"
        ]);

        return view('teacher.edit')
            ->with('teacher', Teacher::where('t_id', $request->id)->first())
            ->with('departments', Department::all());
    }

    public function editSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:teachers,t_id"
        ]);

        $teacher = Teacher::where('t_id', '=', $request->id)->first();
        $teacher->name = $request->name;
        $teacher->d_id = $request->department;
        $teacher->update();

        session()->flash('message', 'Successfully updated');

        return back();
    }

    public function delete(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:teachers,t_id"
        ]);

        return view('teacher.delete')
            ->with('teacher', Teacher::where('t_id', $request->id)->first());
    }

    public function deleteSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:teachers,t_id"
        ]);

        $teacher = Teacher::where('t_id', '=', $request->id)->first();
        $teacher->delete();

        session()->flash('message', 'Successfully deleted');

        return redirect()->route('teacher.list');
    }
}
