<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use App\Models\Organization\Organization;
use Illuminate\Http\Request;
use Hash;
use File;
use Redirect;

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

        $countriesCount = Course::select()->count();
        $citiesCount = Organization::select()->count();
        $adminsCount = Admin::select()->count();

        return view('admins.index', compact('countriesCount', 'citiesCount', 'adminsCount'));
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
        $allCourses = Course::select()->orderBy('id', 'desc')->get();

        return view('admins.allCourses', compact('allCourses'));
    }

    public function createCourse()
    {
        return view('admins.createCourses');
    }

    public function storeCourse(Request $req)
    {
        Request()->validate([
            "name" => "required|max:40",
            "population" => "required|max:40",
            "territory" => "required|max:40",
            "avg_price" => "required|max:40",
            "description" => "required|max:300",
            "image" => "required|mimes:jpeg,png,jpg,gif",
            "continent" => "required|max:40"
        ]);

        $destinationPath = 'assets/images/';
        $myImage = $req->image->getClientOriginalName();
        $req->image->move(public_path($destinationPath), $myImage);

        $storeCourses = Course::create([
            'name' => $req->name,
            'population' => $req->population,
            'territory' => $req->territory,
            'avg_price' => $req->avg_price,
            'description' => $req->description,
            'image' => $myImage,
            'continent' => $req->continent,
        ]);
        if ($storeCourses) {
            return Redirect::route('all.countries')->with(['success' => 'Course created successfully']);
        }

        return view('admins.createCourses');
    }

    public function deleteCourse($id)
    {
        $deleteCourse = Course::find($id);

        if (File::exists(public_path('assets/images/' . $deleteCourse->image))) {
            File::delete(public_path('assets/images/' . $deleteCourse->image));
        } else {
            //dd('File does not exists.');
        }
        $deleteCourse->delete();
        if ($deleteCourse) {
            return Redirect::route('all.countries')->with(['success' => 'Course deleted successfully']);
        }


        return view('admins.allCourses');
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
