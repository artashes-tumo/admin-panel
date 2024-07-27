@extends('layouts.app')

@section('head')
<style>
    .delete-button {
        margin-left: 10px;
    }

    .table-actions {
        display: flex;
    }

    /* Heartstopper-themed styling */
    .modal-content {
        background-color: #f9f9f9;
        /* Light background */
        border-radius: 15px;
        /* Rounded corners */
        color: #333;
        /* Darker text for contrast */
    }

    .modal-header {
        border-bottom: 1px solid #ddd;
        background: linear-gradient(135deg, #ff5c5c, #ff8585);
        /* Gradient background */
    }

    .modal-title {
        color: #fff;
        /* White text for contrast */
    }

    .modal-body p {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        /* Lighthearted font */
    }

    .btn-primary {
        background: linear-gradient(135deg, #5a9bd4, #82b3e0);
        /* Gradient background for primary buttons */
        border: none;
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4a8ac3, #699fcf);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ff5c5c, #ff8585);
        /* Gradient background for danger buttons */
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #e14f4f, #f76b6b);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #d0e0f0, #e0f0ff);
        /* Gradient background for secondary buttons */
        border: none;
        color: #333;
    }

    .btn-secondary:hover {
        background: linear-gradient(135deg, #b0c0e0, #c0d0f0);
    }

    .button-content {
        margin-bottom: 15px;
        text-align: right;
    }

    .table {
        margin-top: 15px;
    }

    /* Additional styles */
    .container {
        font-family: 'Comic Sans MS', cursive, sans-serif;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="container">
    @if (Auth::user()->role != 'writer')
        <div class="button-content">
            <a href="{{route('member_create')}}" class="btn btn-sm btn-primary">Add New Friend</a>
        </div>
    @endif
    <table id="members_list_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Job Title</th>
                <th>Salary</th>
                <th>Joined At</th>
                @if (Auth::user()->role != 'writer')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->position }}</td>
                    <td>{{ $member->salary }}</td>
                    <td>{{ Carbon\Carbon::parse($member->joined_at)->format('d-m-Y') }}</td>

                    @if (Auth::user()->role != 'writer')
                        <td class="table-actions">
                            <a class="btn btn-sm btn-primary" href="{{route('member_edit', ['id' => $member->id])}}">Edit</a>

                            @if (Auth::user()->role == 'super-admin')
                                <button type="button" class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{$member->id}}">
                                    Say Goodbye
                                </button>

                                <div class="modal fade" id="exampleModal-{{$member->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel-{{$member->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel-{{$member->id}}">Farewell?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mb-0">Hey there! It looks like you’re about to bid farewell to
                                                    <strong>{{$member->first_name}} {{$member->last_name}}</strong>. 😢
                                                </p>
                                                <p class="mb-0">Are you absolutely sure you want to go through with this? Once it's
                                                    done, there’s no turning back.</p>
                                                <p class="mb-0">We’ll miss them dearly!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No,
                                                    Keep Them</button>
                                                <form action="{{route('member_delete', ['id' => $member->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-sm btn-danger" type="submit" value="Yes, Let’s Do It">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(() => {
        $('#members_list_table').DataTable({});
    })
</script>
@endsection