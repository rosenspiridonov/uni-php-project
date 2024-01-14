@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <form id="search-form" name="gs" method="POST" role="search" action="{{route('courses.results')}}">
        @csrf
        <div class="row">
            <div class="col-lg-2">
                <h4>Search by organization:</h4>
            </div>
            <div class="col-lg-4">
                <fieldset>
                    <select name="organization_id" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                        <option selected>Organization</option>
                        @foreach ($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset>
                    <select name="duration" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                        <option selected>Duration</option>
                        <option value="1.5">1.5h</option>
                        <option value="2">2h</option>
                        <option value="2.5">2.5h</option>
                    </select>
                </fieldset>
            </div>
            <div class="col-lg-2">
                <fieldset>
                    <button class="btn btn-secondary">Search Results</button>
                </fieldset>
            </div>
        </div>
    </form>
</div>

<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/' . $course->image) }}" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">${{$course->price}}</h3>
                        <h5 class="mb-4">{{$course->name}}</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->teacher}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{$course->duration}} Hrs</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-building text-primary me-2"></i>{{$course->organization->name}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Courses End -->


@endsection