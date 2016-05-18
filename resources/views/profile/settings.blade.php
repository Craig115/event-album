@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Settings</h1>

                    <h2>Update your information</h2>

                    <form method="POST" action="/settings/update/{{ $user->id }}" enctype="multipart/form-data">
                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        First Name: <input name = "firstname" value="{{ $user->firstname }}"></input></br>
                        Last Name: <input name = "lastname" value="{{ $user->lastname }}"></input></br>
                        Email Address: <input name = "email" value="{{ $user->email }}"></input></br>
                        Change Profile Pic: <input type = "file" name = "profile_pic"></input></br>
                        <button type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
