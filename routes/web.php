<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/courses', [App\Http\Controllers\Course\CourseController::class, 'index'])->name('courses');
Route::post('/courses-results', [App\Http\Controllers\Course\CourseController::class, 'searchCourses'])->name('courses.results');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admin\AdminController::class, 'allAdmins'])->name('admins.all.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admin\AdminController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admin\AdminController::class, 'storeAdmins'])->name('admins.store');

    Route::get('/all-countries', [App\Http\Controllers\Admin\AdminController::class, 'allCourses'])->name('all.courses');
    Route::get('/create-countries', [App\Http\Controllers\Admin\AdminController::class, 'createCourse'])->name('create.courses');
    Route::post('/create-courses', [App\Http\Controllers\Admin\AdminController::class, 'storeCourse'])->name('store.courses');
    Route::get('/delete-courses/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteCourse'])->name('delete.courses');

    Route::get('/all-organizations', [App\Http\Controllers\Admin\AdminController::class, 'allOrganizations'])->name('all.organizations');
    Route::get('/create-organizations', [App\Http\Controllers\Admin\AdminController::class, 'createOrganization'])->name('create.organizations');
    Route::post('/create-organizations', [App\Http\Controllers\Admin\AdminController::class, 'storeOrganization'])->name('store.organizations');
    Route::get('/delete-organizations/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteOrganization'])->name('delete.organizations');
});