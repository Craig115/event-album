@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Welcome, {{ Auth::user()->firstname }}
                </div>

                <div class="panel-body">
                    @foreach ($album as $result)

                      <ul>
                        <li><a href="/albums/{{ $result->id }}">{{ $result->title }}</a> By: <a href="/profile/{{ $result->user->id }}">{{ $result->user->username }}</a></li>

                          {{--*/ $i = 0 /*--}}

                          @foreach ($result->photos as $photo)

                            @if(++$i > 5)
                              @break
                            @endif

                            <li><a href ="/images/{{ $photo->id }}"><img src="{{ $photo->thumbnail }}"></a></li>

                          @endforeach

                          @foreach ($result->comments as $comment)

                            <ul>
                              <li>{{ $comment->comment }}</li>
                            </ul>

                          @endforeach

                      </ul>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
