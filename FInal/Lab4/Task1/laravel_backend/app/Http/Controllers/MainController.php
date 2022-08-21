<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class MainController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function allListByDepartment(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->validate($request, [
            'id' => 'required|numeric|exists:departments,d_id',
        ]);

        $department = Department::where('d_id', $request->id)->first();

        return view('home.allListByDepartment')
            ->with('department', $department);
    }
}
