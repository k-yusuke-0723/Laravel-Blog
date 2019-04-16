@extends('main')

@section('title', '| All Posts')

@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1>ALL Posts</h1>
    </div>

    <div class="col-md-2">
      <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">新規投稿</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div><!-- end of row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At</th>
          <th></th>
        </thead>

        <tbody>

          @foreach($posts as $post)

            <tr>
              <th>{{ $post -> id }}</th>
              <th>{{ $post -> title }}</th>
              <th>{{ substr($post -> body, 0, 50) }}{{ strlen($post -> body) > 50 ? "..." : "" }}</th>
              <th>{{ $post -> created_at }}</th>
              <td><a href="#" class="btn btn-default">View</a> <a href="#" class="btn btn-default">Edit</a></td>
            </tr>

          @endforeach

        </tbody>
      </table>
    </div>
  </div>

@stop
