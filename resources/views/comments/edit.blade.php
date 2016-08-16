@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Edit Comment</h1>

                    <form method="POST" action="/comments/{{ $comment->id }}">

                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        <textarea name = "comment">{{ $comment->comment }}</textarea>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
