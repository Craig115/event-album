@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Welcome, {{ Auth::user()->firstname }}
                  <select>
                    <option value="recent">Most Recent</option>
                    <option value="popular">Most Popular</option>
                  </select>
                </div>

                <div class="panel-body">
                    @foreach ($album as $result)

                      <ul>
                        <li>{{ $result->title }} By: {{ $result->user->username }}</li>

                          {{--*/ $i = 0 /*--}}

                          @foreach ($result->photos as $photo)

                            @if(++$i > 5)
                              @break
                            @endif

                            <li><img src="{{ $photo->path }}"></li>

                          @endforeach

                      </ul>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
