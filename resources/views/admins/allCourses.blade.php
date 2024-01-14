@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
                <h5 class="card-title mb-4 d-inline">Courses</h5>
                <a href="{{route('create.courses')}}" class="btn btn-primary mb-4 text-center float-right">Create Course</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Price</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Organization</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allCourses as $courses)
                        <tr>
                            <th scope="row">{{$courses -> id}}</th>
                            <td>{{$courses -> name}}</td>
                            <td>{{$courses -> date}}</td>
                            <td>{{$courses -> duration}}</td>
                            <td>{{$courses -> price}}</td>
                            <td>{{$courses -> teacher}}</td>
                            <td>{{$courses -> organization -> name}}</td>
                            <td><a href="{{route('delete.courses', $courses -> id)}}" class="btn btn-danger  text-center ">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection