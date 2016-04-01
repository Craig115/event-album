@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  <ul>

                    @foreach ($user as $result)


                      <li><a href="/profile/{{ $result->id }}">{{ $result->username }}</a></li>

                    @endforeach

                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
