@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  <h1> Upload New Image </h1>

                  <form method="POST" action="/uploads/2" enctype="multipart/form-data">

                      {{ csrf_field() }}
                      <input type="file" name="fileName">
                      <button type="submit">Upload</button>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
