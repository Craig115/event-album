@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  <h1>Search Results</h1>
                  <ul>

                    @foreach ($user as $result)


                      <li><h6>Username: <a href="/profile/{{ $result->id }}">{{ $result->username }}</a></h6></li>

                    @endforeach

                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
