@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $user->username }}</h1>
                    <ul>
                      @foreach ($user->albums as $album)

                        <li><a href="/albums/{{ $album->id }}">{{ $album->title }}</a></li>

                      @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
