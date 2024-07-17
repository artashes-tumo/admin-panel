@extends('layouts.app')

@section('content')
<div class="container">
    <table>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Job Titile</th>
            <th>Salary</th>
            <th>Joined at</th>
        </tr>
        @foreach ($members as $member)
        <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->email}}</td>
            <td>{{$member->first_name}}</td>
            <td>{{$member->last_name}}</td>
            <td>{{$member->gender}}</td>
            <td>{{$member->age}}</td>
            <td>{{$member->job_title}}</td>
            <td>{{$member->salary}}</td>
            <td>{{$member->joined_at}}</td>
        </tr>

        @endforeach
    </table>
</div>
@endsection