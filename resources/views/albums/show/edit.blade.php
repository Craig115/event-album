@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Edit Album</h1>

                    <form method="POST" action="/albums/{{ $album->id }}">

                        {{ method_field('PATCH')}}
                        {{ csrf_field() }}
                        <textarea name = "title">{{ $album->title }}</textarea>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
