@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Course</h5>
                <form method="POST" action="{{ route('store.courses') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="courseName" class="form-control" placeholder="Course Name" value="{{ old('name') }}" />
                        @error('name')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input type="date" name="date" id="courseDate" class="form-control" placeholder="Course Date" value="{{ old('date') }}" />
                        @error('date')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input type="number" name="duration" id="courseDuration" class="form-control" placeholder="Course Duration" value="{{ old('duration') }}" />
                        @error('duration')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input type="number" name="price" id="coursePrice" class="form-control" placeholder="Course Price" value="{{ old('price') }}" />
                        @error('price')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" name="teacher" id="courseTeacher" class="form-control" placeholder="Teacher's Name" value="{{ old('teacher') }}" />
                        @error('teacher')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <select name="organization_id" id="organizationId" class="form-control">
                            <option value="">Select Organization</option>
                            @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}" {{ old('organization_id') == $organization->id ? 'selected' : '' }}>
                                {{ $organization->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('organization_id')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input type="file" name="image" id="courseImage" class="form-control" />
                        @error('image')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control" placeholder="Course Description" id="courseDescription" style="height: 100px">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create Course</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection