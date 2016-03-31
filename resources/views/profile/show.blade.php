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

                            <form method="POST" action="/albums/{{ $album->id }}" v-ajax complete="Your album has been deleted">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.20/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
<script>
  Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value;

  Vue.directive('ajax', {

    params: ['complete'],

    bind: function(){
      this.el.addEventListener('submit', this.onSubmit.bind(this));
    },

    update: function(value){

    },

    onSubmit: function(e){
      e.preventDefault();

      this.vm
        .$http[this.getRequestType()](this.el.action)
        .then(this.onComplete.bind(this));
        .catch(this.onError.bind(this));
    },

    onComplete: function(){
      if (this.params.complete) {
        alert(this.params.complete);
      }
    },

    onError: function(response){
      alert(response.data.message);
    },

    getRequestType: function(){
      var method = this.el.querySelector('input[name="_method"]');

      return (method ? method.value : this.el.method).toLowerCase();
    },

  });

  new Vue({
    el: 'body'
  });
</script>

@endsection
