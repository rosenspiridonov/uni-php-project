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
          <h5 class="card-title mb-4 d-inline">Organizations</h5>
          <a  href="{{route('create.organizations')}}" class="btn btn-primary mb-4 text-center float-right">Create Organization</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($allOrganizations as $organization)
              <tr>
                <th scope="row">{{$organization->id}}</th>
                <td>{{$organization->name}}</td>
                <td>{{$organization->category}}</td>
                <td><img src="{{asset('assets/img/'.$organization->image.'')}}" width="60" height="50"/></td>
                 <td><a href="{{route('delete.organizations', $organization -> id)}}" class="btn btn-danger  text-center ">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
  @endsection