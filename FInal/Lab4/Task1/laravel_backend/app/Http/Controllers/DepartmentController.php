<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function studentsByDepartment(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        $department = Department::where('d_id', $request->id)->first();
        return view('department.studentsByDepartment')
            ->with('department', $department);
    }

    public function coursesByDepartment(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        $department = Department::where('d_id', $request->id)->first();
        return view('department.coursesByDepartment')
            ->with('department', $department);
    }

    public function teachersByDepartment(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        $department = Department::where('d_id', $request->id)->first();
        return view('department.teachersByDepartment')
            ->with('department', $department);
    }

    public function list()
    {
        return view('department.list')
            ->with('departments', Department::all());
    }

    public function create()
    {
        return view('department.create');
    }

    public function createSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha'
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->save();

        session()->flash('message', "Successfully Registered");

        return back();
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        return view('department.edit')
            ->with('department', Department::where('d_id', $request->id)->first());
    }

    public function editSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        $department = Department::where('d_id', '=', $request->id)->first();
        $department->name = $request->name;
        $department->update();

        session()->flash('message', 'Successfully updated');

        return back();
    }

    public function delete(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        return view('department.delete')
            ->with('department', Department::where('d_id', $request->id)->first());
    }

    public function deleteSubmit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            "id" => "required|exists:departments,d_id"
        ]);

        $department = Department::where('d_id', '=', $request->id)->first();
        $department->delete();

        session()->flash('message', 'Successfully deleted');

        return redirect()->route('department.list');
    }
}
