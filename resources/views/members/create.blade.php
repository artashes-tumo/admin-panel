@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('member_store')}}" method="POST">
        <!-- CSRF Token -->
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
        </div>

        <!-- First and Last Names -->
        <div class="mb-3 row">
            <div class="col">
                <label for="first_name" class="form-label">First Name</label>
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter first name">
            </div>
            <div class="col">
                <label for="last_name" class="form-label">Last Name</label>
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter last name">
            </div>
        </div>

        <!-- Image and Position -->
        <div class="mb-3 row">
            <div class="col">
                <label for="image" class="form-label">Image Link</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Enter image URL">
            </div>
            <div class="col">
                <label for="position" class="form-label">Position</label>
                <input name="position" type="text" class="form-control" id="position" placeholder="Enter position">
            </div>
        </div>

        <!-- Age and Salary -->
        <div class="mb-3 row">
            <div class="col">
                <label for="age" class="form-label">Age</label>
                <input name="age" type="number" class="form-control" id="age" placeholder="Enter age">
            </div>
            <div class="col">
                <label for="salary" class="form-label">Salary</label>
                <input name="salary" type="number" class="form-control" id="salary" placeholder="Enter salary">
            </div>
        </div>

        <!-- Gender and Joined At -->
        <div class="mb-3 row">
            <div class="col">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col">
                <label for="joined_at" class="form-label">Joined At</label>
                <input name="joined_at" type="date" class="form-control" id="joined_at">
            </div>
        </div>

        <!-- Submit and Back Buttons -->
        <div class="d-flex justify-content-between">
            <a href="{{route('member_index')}}" class="btn btn-secondary">Back</a>
            <input type="submit" class="btn btn-success" value="Add Member">
        </div>
    </form>
</div>
@endsection

@section('head')
<style>
    .container {
        background-color: #fefefe; /* Soft white background for warmth */
        border-radius: 15px; /* Rounded corners for a friendly feel */
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    }

    .form-label {
        color: #5a9bd4; /* Soft blue for a calming effect */
    }

    .form-control,
    .form-select {
        border-radius: 10px; /* Rounded corners for inputs */
        border: 1px solid #ddd; /* Light border for a soft look */
    }

    .btn-success {
        background-color: #5a9bd4; /* Heartstopper-inspired color for the submit button */
        border: none;
    }

    .btn-success:hover {
        background-color: #4a8ac3;
    }

    .btn-secondary {
        background-color: #d0e0f0; /* Light blue for the back button */
        border: none;
    }

    .btn-secondary:hover {
        background-color: #b0c0e0;
    }
</style>
@endsection
