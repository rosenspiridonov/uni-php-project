@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Courses</h5>
          <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
          <p class="card-text">number of courses: {{$coursesCount}}</p>
         
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Organization</h5>
          
          <p class="card-text">number of organizations: {{$organizationsCount}}</p>
        
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>
          
          <p class="card-text">number of admins: {{$adminsCount}}</p>
          
        </div>
      </div>
    </div>
  </div>
  @endsection