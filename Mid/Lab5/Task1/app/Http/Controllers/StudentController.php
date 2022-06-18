<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    public function list()
    {
        return view('student.list')
            ->with('students', Student::all());
    }

    public function create()
    {
        return view('student.create')
            ->with('departments', Department::all())
            ->with('courses', Course::all());
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

        $student = new Student();
        $student->name = $request->name;
        $student->d_id = $request->department;
        $student->save();

        foreach ($request->courses as $course) {
            $student->courses()->attach($course);
        }

        $student->save();

        session()->flash('message', 'Successfully registered');

        return back();
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:students,s_id"
        ]);

        return view('student.edit')
            ->with('student', Student::where('s_id', $request->id)->first())
            ->with('departments', Department::all());
    }

    public function editSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:students,s_id"
        ]);

        $student = Student::where('s_id', '=', $request->id)->first();
        $student->name = $request->name;
        $student->d_id = $request->department;
        $student->update();

        session()->flash('message', 'Successfully updated');

        return back();
    }

    public function delete(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:students,s_id"
        ]);

        return view('student.delete')
            ->with('student', Student::where('s_id', $request->id)->first());
    }

    public function deleteSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:students,s_id"
        ]);

        $student = Student::where('s_id', '=', $request->id)->first();
        $student->delete();

        session()->flash('message', 'Successfully deleted');

        return redirect()->route('student.list');
    }
}
