<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">KMYSK Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a class="nav-link" href="/">Home</a></li>
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a class="nav-link" href="/blog">Blog</a></li>
        <li class="{{ Request::is('about') ? "active" : "" }}"><a class="nav-link" href="/about">About</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a class="nav-link" href="/contact">Contact</a></li>
        <li class="nav-item dropdown navbar-right">
          @if (Auth::check())

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">HELLO {{ Auth::user()->name }}さん</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/home">Logout</a>
          </div>
        </li>

        @else

          <ul class="nav navbar-nav">
            <li class="{{ Request::is('login') ? "active" : "" }}"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="{{ Request::is('register') ? "active" : "" }}"><a class="nav-link" href="{{ route('register') }}">新規登録</a></li>

        @endif
      </ul>
    </div>
</nav>
