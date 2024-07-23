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
        <!-- Approving -->
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <!-- email -->

        <div class="row">
            <div class="col">
                <input name="email" type="email" class="form-control" placeholder="His/Her email">
            </div>
        </div>

        <br>

        <!-- First, last names -->
        <div class="row">
            <div class="col">
                <input name="first_name" type="text" class="form-control" placeholder="His/Her First name">
            </div>
            <div class="col">
                <input name="last_name" type="text" class="form-control" placeholder="His/Her Last name">
            </div>
        </div>

        <br>

        <!-- Image, position -->
        <div class="row">
            <div class="col">
                <input name="image" type="text" class="form-control" placeholder="His/Her Image link">
            </div>
            <div class="col">
                <input name="position" type="text" class="form-control" placeholder="His/Her position">
            </div>
        </div>

        <br>

        <!-- Age, salary -->
        <div class="row">
            <div class="col">
                <input name="age" type="number" class="form-control" placeholder="His/Her age">
            </div>
            <div class="col">
                <input name="salary" type="number" class="form-control" placeholder="His/Her salary">
            </div>
        </div>

        <br>

        <!-- Gender, joined at -->
        <div class="row">
            <div class="col">
                <label type="box" style="margin-right: 10px;">His/Her gender:</label>
                <select name="gender">
                    <option value="">Select gender↓</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col">
                <label type="box">He/She joined at:</label>
                <input name="joined_at" type="date" class="form-control" placeholder="He/She joined at:">
            </div>
        </div>

        <!-- Submit, Back -->
        <div class="row">
            <div class="col">
                <a style="margin-right: 10px;" href="{{route('member_index')}}" class="btn btn-sm btn-primary">Back</a>
                <input type="submit" class="btn btn-sm btn-success" value="Add Member">
            </div>
        </div>
    </form>
</div>
@endsection
