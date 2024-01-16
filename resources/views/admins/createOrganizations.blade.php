@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Organiation</h5>
      <form method="POST" action="{{route('create.organizations')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
            </div>
            @if($errors->has('name'))
            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
            <div class="form-outline mb-4 mt-4">
              <input type="file" name="image" id="form2Example1" class="form-control"  />
            </div>
            @if($errors->has('image'))
             <p class="alert alert-danger">{{ $errors->first('image') }}</p>
            @endif
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="category" id="form2Example1" class="form-control" placeholder="category" />
            </div>
            @if($errors->has('category'))
            <p class="alert alert-danger">{{ $errors->first('category') }}</p>
            @endif
    <br>
    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection