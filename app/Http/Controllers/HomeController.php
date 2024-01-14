<?php

namespace App\Http\Controllers;

use App\Models\Course\Course;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::select()->orderBy("id", "desc")->take(3)->get();
        $organizations = Organization::select()->orderBy("id", "desc")->take(3)->get();

        return view("home", compact('courses', 'organizations'));
    }
}
