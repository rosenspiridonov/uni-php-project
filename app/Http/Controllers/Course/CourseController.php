<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use App\Models\Organization\Organization;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('organization')->get();
        $organizations = Organization::all();

        return view("courses.courses", compact('courses', 'organizations'));
    }

    public function searchCourses(Request $req)
    {
        $organizations = Organization::all();

        $query = Course::query()->with('organization');

        $organization_id = $req->get('organization_id');
        if (is_numeric($organization_id)) {
            $query->where('organization_id', $organization_id);
        }

        $duration = $req->get('duration');
        if (is_numeric($duration)) {
            $query->where('duration', '<=', $duration);
        }

        $searches = $query->orderBy('id', 'desc')->get();
        return view('courses.coursesResults', compact('searches', 'organizations'));
    }
}
