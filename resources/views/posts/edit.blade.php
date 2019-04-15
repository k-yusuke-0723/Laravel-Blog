@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

  <div class="row">
    <div class="col-md-8">
      {!! Form::model($post, ['route' => ['posts.update', $post -> id]]) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

        {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    </div>


    <div class="col-md-4">
      <div class="well">

        <dl class="dl-horizontal">
          <dt>Create At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post -> created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post -> updated_at)) }}</dd>
        </dl>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.show', 'キャンセル', array($post -> id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.update', '変更を保存', array($post -> id), array('class' => 'btn btn-success btn-block')) !!}
          </div>
        </div>

      </div>
    </div>
    {!! Form::close() !!}
  </div><!-- end of form -->

@stop