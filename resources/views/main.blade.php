<!doctype html>
<html lang="en">
  <head>
  @include('partials._head')
  </head>

  <body>

    @include('partials._nav')

    <div class="container">
      @include('partials._messages')

      {{ Auth::check() ? "Logged In" : "Logged Out" }}

      @yield('content')

      @include('partials._footer')

    </div> <!-- containerクラスの終了 -->

      @include('partials._javascript')

      @yield('scripts')
  </body>

</html>
