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

    <form action="{{route('member_update', ['id' => $member->id])}}" method="POST">
        <!-- Approving -->
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <!--  -->
        <input type="hidden" name="_method" value="PUT">

        <!-- Email -->

        <div class="row">
            <div class="col">
                <input value="{{$member->email}}" name="email" type="email" class="form-control"
                    placeholder="His/Her email">
            </div>
        </div>

        <br>

        <!-- First, last names -->
        <div class="row">
            <!-- First name -->
            <div class="col">
                <input value="{{$member->first_name}}" name="first_name" type="text" class="form-control"
                    placeholder="His/Her First name">
            </div>

            <!-- Last name -->
            <div class="col">
                <input value="{{$member->last_name}}" name="last_name" type="text" class="form-control"
                    placeholder="His/Her Last name">
            </div>
        </div>

        <br>

        <!-- Image, position -->
        <div class="row">
            <!-- Image -->
            <div class="col">
                <input value="{{$member->image}}" name="image" type="text" class="form-control"
                    placeholder="His/Her Image link">
            </div>

            <!-- Position -->
            <div class="col">
                <input value="{{$member->position}}" name="position" type="text" class="form-control"
                    placeholder="His/Her position">
            </div>
        </div>

        <br>

        <!-- Age, salary -->
        <div class="row">
            <!-- Age -->
            <div class="col">
                <input value="{{$member->age}}" name="age" type="number" class="form-control" placeholder="His/Her age">
            </div>

            <!-- Salary -->
            <div class="col">
                <input value="{{$member->salary}}" name="salary" type="number" class="form-control"
                    placeholder="His/Her salary">
            </div>
        </div>

        <br>

        <!-- Gender, joined at -->
        <div class="row">
            <div class="col">
                <!-- Gender -->
                <label type="box" style="margin-right: 10px;">His/Her gender:</label>
                <select name="gender">
                    <option value="">Select gender↓</option>
                    <option value="male" {{$member->gender == 'male' ? 'selected' : ''}}>Male</option>
                    <option value="female" {{$member->gender == 'female' ? 'selected' : ''}}>Female</option>
                </select>
            </div>
            <div class="col">
                <!-- Joined at -->
                <label type="box">He/She joined at:</label>
                <input value="{{$member->joined_at}}" name="joined_at" type="text" class="form-control"
                    placeholder="He/She joined at:">
            </div>
        </div>

        <!-- Submit, Back -->
        <div class="row">
            <div class="col">
                <!-- Back -->
                <a style="margin-right: 10px;" href="{{route('member_index')}}" class="btn btn-sm btn-primary">Back</a>
                <!-- Submit -->
                <input type="submit" class="btn btn-sm btn-success" value="Save Member">
            </div>
        </div>
    </form>
</div>
@endsection