@extends('main')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="styles.css">
@endsection

@section('title', '| Homepage')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="jumbotron">
                <h1 class="display-4">ようこそ、ブログへ！</h1>
                <p class="lead">来てくれてありがとう！</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a>
              </div>
          </div>
      </div> <!-- headerのrowクラスの終わり -->

      <div class = "row">
        <div class = "col-md-8">

          @foreach($posts as $post)

            <div class="post">
              <h3>{{ $post -> title }}</h3>
              <p>{{ $post -> body }}</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>

            <hr>

          @endforeach

        </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Sideber</h2>
            </div>
        </div>
@endsection

@section('scripts')
{{--   <script>
      confirm('I loaded up some JS')
  </script> --}}
@endsection
