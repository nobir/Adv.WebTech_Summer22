<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index')
            ->with("page_title", "Home | Page");
    }

    public function registration()
    {
        return view('user.registration')
            ->with("page_title", "Registration | Page");
    }

    public function registrationSubmit(Request $request)
    {
        $request->validate(
            [
                'id' => "required|regex:/^^([0-5]{3}-[0-9]{2}-[1-3]{2})+$/",
                'name' => "required|regex:/^[a-zA-Z\s\.\-]+$/",
                'dob' => "required|date|before:-18years",
                'email' => "required|regex:/^(([0-9]{2}-[0-9]{5}-[1-3]{1})@student\.aiub\.edu)+$/",
                'phone' => "required|regex:/^((01)([3-9]{1})([0-9]{8}))+$/",
            ],
            [
                "dob.before" => "You must be 18 year old"
            ]
        );

        $user = new User();
        $user->uid = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->save();

        return "Successfully registered";
    }

    public function show()
    {
        $users = User::all();

        return view('user.show')
            ->with('page_title', "Show User | Page")
            ->with('users', $users);
    }

    public function single(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if (!$user) {
            return "No User found";
        }

        return view('user.single')
            ->with('page_title', $user->name . " | Page")
            ->with('user', $user);
    }
}
