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

                      @foreach ($album->photos as $photo)

                        <li>
                          <a href="/images/{{ $photo->id }}"><img src="{{ $photo->path }}"></a>

                          @if($photo->user_id == Auth::id())

                            <form method="POST" action="/photos/{{ $photo->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit">Delete</button>
                            </form>

                          @endif

                        </li>

                      @endforeach


                      @foreach ($album->comments as $comment)

                        <li>

                          {{ $comment->comment }} <a href="/profile/{{ $comment->user_id }}">By: {{ $comment->user->username }}</a>

                          @if($comment->user_id == Auth::id())

                            <a href="/comments/{{ $comment->id }}/edit">Edit</a>

                            <form method="POST" action="/comments/{{ $comment->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit">Delete</button>
                            </form>

                          @endif

                        </li>

                      @endforeach

                      You Like this

                      <form method="POST" action="/likes/{{ $like->id }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit">Unlike</button>
                      </form>

                      @if ($album->user_id == Auth::id())

                      <h1>Edit Album</h1>

                      <form method="POST" action="/albums/{{ $album->id }}">
                          {{ method_field('PATCH')}}
                          {{ csrf_field() }}
                          <textarea name = "title">{{ $album->title }}</textarea>
                          <button type="submit">Update</button>
                      </form>

                      <h1> Upload New Image </h1>

                      <form method="POST" action="/uploads/{{ $album->id}}" enctype="multipart/form-data">

                          {{ csrf_field() }}
                          <input type="file" name="fileName">
                          <textarea name = "description"></textarea>
                          <button type="submit">Upload</button>

                      </form>

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
