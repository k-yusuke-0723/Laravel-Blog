@extends('main')

@section('title', '| View Post')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>
      <p class="lead">{{ $post->body }}</p>
    </div>


    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>URL:</label>
          <p><a href="{{ url($post -> slug) }}">{{ url($post -> slug) }}</a></p>
        </dl>
        <dl class="dl-horizontal">
          <label>Create At:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post -> created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post -> updated_at)) }}</p>
        </dl>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', '編集', array($post -> id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">

            {!! Form::open(['route' => ['posts.destroy', $post -> id], 'method' => 'DELETE'])  !!}

            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {{ Html::linkroute('posts.index', '<<一覧表示へ戻る', [], ['class' => 'btn btn-dafault btn-block btn-h1-spacing btn-edit']) }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
