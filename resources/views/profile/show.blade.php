@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                @include ('flash')

                <div class="panel-body">

                    <div class="profile-head">
                      <img id="profile" src="{{ $user->profile_pic}}"/>
                      <h1>{{ $user->username }}</h1>
                    </div>

                    <h1 id="album-tag">Albums</h1>

                    <ul class="album-row">

                      @foreach ($user->albums as $album)

                        <li class="album">

                          <a href="/albums/{{ $album->id }}">{{ $album->title }}</a>

                          @if ($user->id == Auth::id())

                              <form method="POST" action="/albums/{{ $album->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </form>

                          @endif

                        </li>

                      @endforeach

                    </ul>

                    @if ($user->id == Auth::id())

                      <h4>Add a new Album <button id="create-album" class="form-toggle"><i id="create-album" class="fa fa-chevron-circle-down" aria-hidden="true"></i></button></h4>

                      <form id="create-album" class="toggle" method="POST" action="/profile/{{ $user->id }}/albums">
                          {{ csrf_field() }}
                          <textarea class="form-control" name = "title" placeholder="Name"></textarea></br>
                          <button class="btn btn-primary" type="submit">Create Album</button>
                      </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
