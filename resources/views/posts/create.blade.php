@extends('main')

@section('title', '| Create New Post')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>

      {!! Form::open(array('route' => 'posts.store')) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-controll')) }}

        {{ Form::label('body', 'Post Body:') }}
        {{ Form::textarea('body', null, array('class' => 'form-controll')) }}
      {!! Form::close() !!}
    </div>
  </div>

@endsection
