@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4">Edit Member</h1>
    <p class="mb-4 text-muted">Update the details of the member below:</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('member_update', ['id' => $member->id])}}" method="POST">
        <!-- CSRF Token -->
        @csrf
        @method('PUT')

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{$member->email}}" name="email" type="email" class="form-control" id="email"
                placeholder="Enter email">
        </div>

        <!-- Names -->
        <div class="mb-3 row">
            <div class="col">
                <label for="first_name" class="form-label">First Name</label>
                <input value="{{$member->first_name}}" name="first_name" type="text" class="form-control"
                    id="first_name" placeholder="Enter first name">
            </div>
            <div class="col">
                <label for="last_name" class="form-label">Last Name</label>
                <input value="{{$member->last_name}}" name="last_name" type="text" class="form-control" id="last_name"
                    placeholder="Enter last name">
            </div>
        </div>

        <!-- Image and Position -->
        <div class="mb-3 row">
            <div class="col">
                <label for="image" class="form-label">Image Link</label>
                <input value="{{$member->image}}" name="image" type="text" class="form-control" id="image"
                    placeholder="Enter image URL">
            </div>
            <div class="col">
                <label for="position" class="form-label">Position</label>
                <input value="{{$member->position}}" name="position" type="text" class="form-control" id="position"
                    placeholder="Enter position">
            </div>
        </div>

        <!-- Age and Salary -->
        <div class="mb-3 row">
            <div class="col">
                <label for="age" class="form-label">Age</label>
                <input value="{{$member->age}}" name="age" type="number" class="form-control" id="age"
                    placeholder="Enter age">
            </div>
            <div class="col">
                <label for="salary" class="form-label">Salary</label>
                <input value="{{$member->salary}}" name="salary" type="number" class="form-control" id="salary"
                    placeholder="Enter salary">
            </div>
        </div>

        <!-- Gender and Joined At -->
        <div class="mb-3 row">
            <div class="col">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="">Select gender</option>
                    <option value="male" {{$member->gender == 'male' ? 'selected' : ''}}>Male</option>
                    <option value="female" {{$member->gender == 'female' ? 'selected' : ''}}>Female</option>
                </select>
            </div>
            <div class="col">
                <label for="joined_at" class="form-label">Joined At</label>
                <input value="{{$member->joined_at}}" name="joined_at" type="date" class="form-control" id="joined_at">
            </div>
        </div>

        <!-- Submit and Back -->
        <div class="d-flex justify-content-between">
            <a href="{{route('member_index')}}" class="btn btn-secondary">Back</a>
            <input type="submit" class="btn btn-success" value="Save Member">
        </div>
    </form>
</div>

@endsection

@section('head')
<style>
    .container {
        background-color: #f8f9fa;
        /* Light background color for a soft feel */
        border-radius: 15px;
        /* Rounded corners */
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for depth */
        font-family: 'Comic Sans MS', cursive, sans-serif;
        /* Reverted font family */
    }

    .form-label {
        color: #5a9bd4;
        /* Heartstopper-inspired color for labels */
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        /* Rounded corners for form elements */
    }

    .btn-success {
        background-color: #5a9bd4;
        /* Heartstopper-inspired color for the save button */
        border: none;
    }

    .btn-success:hover {
        background-color: #4a8ac3;
    }

    .btn-secondary {
        background-color: #d0e0f0;
        /* Heartstopper-inspired color for the back button */
        border: none;
    }

    .btn-secondary:hover {
        background-color: #b0c0e0;
    }

    .alert-danger {
        color: #ff5c5c;
        /* Heartstopper-inspired color for error messages */
        border: 1px solid #ff5c5c;
        border-radius: 10px;
    }

    .alert-danger ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
</style>
@endsection
