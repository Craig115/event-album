@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $album->title }}</h1>
                    <ul>
                      @foreach ($album->comments as $comment)

                      <li>
                        {{ $comment->comment }}
                        <a href="#">By: {{ $comment->user->name }}</a>
                      </li>

                      @endforeach

                      <h3>Add a new Comment</h3>

                      <form method="POST" action="/albums/{{ $album->id }}/comments">
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
