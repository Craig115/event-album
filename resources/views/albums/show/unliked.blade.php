@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $album->title }}</h1>
                    <ul>

                      <?php $i = 0; ?>

                      @foreach ($album->likes as $like)

                        <?php $i++ ?>

                      @endforeach

                      {{ $i }} Likes


                      @foreach ($album->comments as $comment)

                        <li>
                          {{ $comment->comment }} <a href="#">By: {{ $comment->user->username }}</a>
                        </li>

                      @endforeach

                      <form method="POST" action="/albums/{{ $album->id }}/likes">
                          {{ csrf_field() }}
                          <button type="submit">Like</button>
                      </form>

                      @if ($album->user_id == Auth::id())

                        <a href="/albums/{{ $album->id }}/edit">Edit</a>

                      @endif


                      <h3>Add a new Comment</h3>

                      <form method="POST" action="/albums/{{ $album->id }}/comments">
                          {{ csrf_field() }}
                          <textarea name = "comment"></textarea>
                          <button type="submit">Create Comment</button>
                      </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection