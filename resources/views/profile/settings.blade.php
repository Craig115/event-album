@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include ('flash')
                <div class="panel-body">
                    <h1>Settings</h1>

                    <h2>Update your information</h2>

                    <form method="POST" action="/settings/update/{{ $user->id }}" enctype="multipart/form-data">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        <h5>First Name:</h5> <input class="form-control" name = "firstname" value="{{ $user->firstname }}"></input></br>
                        <h5>Last Name:</h5> <input class="form-control" name = "lastname" value="{{ $user->lastname }}"></input></br>
                        <h5>Email Address:</h5> <input class="form-control" name = "email" value="{{ $user->email }}"></input></br>
                        <h5>Change Profile Pic:</h5> <input type = "file" name = "profile_pic"></input></br>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
