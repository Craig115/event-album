@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include ('flash')
                <div class="panel-body">

                    <ul>
                      <h1>{{ $album->title }}</h1>
                      <?php $i = 0; ?>

                      @foreach ($album->likes as $like)

                        <?php $i++ ?>

                      @endforeach

                      <h6>{{ $i }} Likes</h6>

                      <div class="image-row">
                        @foreach ($album->photos as $photo)
                          <li>
                            <div class="image-container">
                                <a href="/images/{{ $photo->id }}"><img src="{{ $photo->thumbnail }}"></a>
                                @if($photo->user_id == Auth::id())
                                  <form method="POST" action="/photos/{{ $photo->id }}">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                                  </form>
                                @endif
                            </div>
                          </li>
                        @endforeach
                      </div>

                      <h4>Read The Comments</h4>

                      @foreach ($album->comments as $comment)

                        <li>

                          <div class="comment-container">

                            <h6><a href="/profile/{{ $comment->user_id }}">{{ $comment->user->username }}</a>: {{ $comment->comment }}</h6> <button id="edit-comment" class="form-toggle"><i id="edit-comment" class="fa fa-pencil" aria-hidden="true"></i></button>

                            @if($comment->user_id == Auth::id())

                              <form method="POST" action="/comments/{{ $comment->id }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </form>

                            @endif

                          </div>

                          @if($comment->user_id == Auth::id())

                            <form method="POST" id="edit-comment" class ="toggle" action="/comments/{{ $comment->id }}">
                                {{ method_field('PATCH')}}
                                {{ csrf_field() }}
                                <textarea class="comment form-control" name = "comment">{{ $comment->comment }}</textarea></br>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>

                          @endif

                        </li>

                      @endforeach

                      @if (Auth::check())

                        <form method="POST" action="/albums/{{ $album->id }}/likes">
                            {{ csrf_field() }}
                            <button type="submit"><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></button>
                        </form>

                      @endif

                      @if ($album->user_id == Auth::id())

                      <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Album <button id="edit-album" class="form-toggle"><i id="edit-album" class="fa fa-chevron-circle-down" aria-hidden="true"></i></button></h4>

                      <form method="POST" id="edit-album" class="toggle" action="/albums/{{ $album->id }}">
                          {{ method_field('PATCH')}}
                          {{ csrf_field() }}
                          <textarea class="form-control" name = "title">{{ $album->title }}</textarea></br>
                          <button class="btn btn-primary" type="submit">Update</button>
                      </form>

                      <h4><i class="fa fa-upload" aria-hidden="true"></i> Upload New Image <button id="upload-image" class="form-toggle"><i id="upload-image" class="fa fa-chevron-circle-down" aria-hidden="true"></i></h4>

                      <form method="POST" id="upload-image" class="toggle" action="/uploads/{{ $album->id}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input class="btn btn-file" type="file" name="fileName" required>
                          <textarea class="form-control" name = "description" placeholder="Enter a description for your image"></textarea></br>
                          <button class="btn btn-primary" type="submit">Upload</button>
                      </form>

                      @endif

                      @if (Auth::check())

                        <h4><i class="fa fa-comment-o" aria-hidden="true"></i> Add a new Comment <button id="add-comment" class="form-toggle"><i id="add-comment" class="fa fa-chevron-circle-down" aria-hidden="true"></i></button></h4>

                        <form method="POST" id="add-comment" class="toggle" action="/albums/{{ $album->id }}/comments">
                            {{ csrf_field() }}
                            <textarea class="form-control" name="comment" placeholder="Add Your Comment Here"></textarea></br>
                            <button class="btn btn-primary" type="submit">Comment</button>
                        </form>

                      @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
