<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Course\Course;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $req)
    {
        $remember_me = $req->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $req->input("email"), 'password' => $req->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {

        $coursesCount = Course::select()->count();
        $organizationsCount = Organization::select()->count();
        $adminsCount = Admin::select()->count();

        return view('admins.index', compact('coursesCount', 'organizationsCount', 'adminsCount'));
    }

    public function allAdmins()
    {

        $allAdmins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.allAdmins', compact('allAdmins'));
    }

    public function createAdmins(Request $req)
    {
        return view('admins.createAdmins');
    }

    public function storeAdmins(Request $req)
    {
        $storeAdmins = Admin::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => Hash::make($req->password),
        ]);
        if ($storeAdmins) {
            return Redirect::route('admins.all.admins')->with(['create' => 'Admin created successfully']);
        }
        return view('admins.createAdmins');
    }

    public function allCourses()
    {
        // This method seems fine as long as the 'organization' relationship is correctly defined in the Course model.
        $allCourses = Course::with('organization')->get();

        return view('admins.allCourses', compact('allCourses'));
    }

    public function createCourse()
    {
        $organizations = Organization::all();

        return view('admins.createCourses', compact('organizations'));
    }

    public function storeCourse(Request $req)
    {
        $validatedData = $req->validate([
            "name" => "required|max:255",
            "date" => "required|date",
            "duration" => "required|numeric",
            "price" => "required|numeric",
            "teacher" => "required|max:255",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "organization_id" => "required|exists:organizations,id",
        ]);

        if ($req->hasFile('image')) {
            $destinationPath = 'assets/images/';
            $myImage = $req->image->getClientOriginalName();
            $req->image->storeAs($destinationPath, $myImage);
        }

        $course = Course::create($validatedData + ['image' => $myImage]);
        if ($course) {
            return Redirect::route('all.courses')->with('success', 'Course created successfully');
        }

        return view('admins.createCourses');
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('admin.allCourses')->with('error', 'Course not found.');
        }

        $imagePath = public_path('assets/images/' . $course->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        if ($course->delete()) {
            return redirect()->route('admin.allCourses')->with('success', 'Course deleted successfully');
        }

        return redirect()->route('admin.allCourses')->with('error', 'Could not delete the course.');
    }


    public function allOrganizations()
    {
        $allOrganizations = Organization::select()->orderBy('id', 'desc')->get();

        return view('admins.allOrganizations', compact('allOrganizations'));
    }

    public function createOrganization()
    {
        $countries = Course::all();
        return view('admins.createOrganizations', compact('countries'));
    }

    public function storeOrganization(Request $req)
    {
        Request()->validate([
            "name" => "required|max:40",
            "image" => "required|mimes:jpeg,png,jpg,gif",
            'num_days' => "required|max:40",
            'price' => "required|max:5",
            'course_id' => "required|max:5",
        ]);

        $destinationPath = 'assets/images/';
        $myImage = $req->image->getClientOriginalName();
        $req->image->move(public_path($destinationPath), $myImage);

        $storeOrganization = Organization::create([
            'name' => $req->name,
            'image' => $myImage,
            'num_days' => $req->num_days,
            'price' => $req->price,
            'course_id' => $req->course_id
        ]);
        if ($storeOrganization) {
            return Redirect::route('all.cities')->with(['success' => 'Organization created successfully']);
        }

        return view('admins.createOrganizations');
    }

    public function deleteOrganization($id)
    {
        $deleteOrganization = Organization::find($id);

        if (File::exists(public_path('assets/images/' . $deleteOrganization->image))) {
            File::delete(public_path('assets/images/' . $deleteOrganization->image));
        } else {
            //dd('File does not exists.');
        }
        $deleteOrganization->delete();
        if ($deleteOrganization) {
            return Redirect::route('all.cities')->with(['success' => 'Organization deleted successfully']);
        }


        return view('admins.allOrganizations');
    }
    //
}
