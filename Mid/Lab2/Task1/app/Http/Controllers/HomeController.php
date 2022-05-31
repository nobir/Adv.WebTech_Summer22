<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('home.home')
            ->with('page_title', "Home");
    }

    function ourTeam()
    {
        $teams = [];

        for ($i = 0; $i < 10; ++$i) {
            $teams[] = [
                'name' => "Name " . ($i + 1),
                'id' => $i + 1,
                'dob' => date('U')
            ];
        }

        return view('home.our-team')
            ->with('page_title', "Our Team")
            ->with('teams', $teams);
    }

    function aboutUs()
    {
        return view('home.about-us')
            ->with('page_title', "About Us");
    }

    function contactUs()
    {
        return view('home.contact-us')
            ->with('page_title', "Contact Us");
    }
}
