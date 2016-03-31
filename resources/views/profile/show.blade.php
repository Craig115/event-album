@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Hi {{ $user->username }}</h1>
                    <ul>
                      @foreach ($user->albums as $album)

                        <li><a href="/albums/{{ $album->id }}">{{ $album->title }}</a></li>

                        @if ($user->id == Auth::id())

                            <form method="POST" action="/albums/{{ $album->id }}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit">Delete</button>
                            </form>

                        @endif

                      @endforeach

                      <h3>Add a new Album</h3>

                      <form method="POST" action="/profile/{{ $user->id }}/albums">
                          {{ csrf_field() }}
                          <textarea name = "title"></textarea>
                          <button type="submit">Create Album</button>
                      </form>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
